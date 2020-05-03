<?php

class LR_Emails {

  static $emails_templates= array(
    'admin/new_user' => 'Nuevo usuario',
    'user/new_user' => 'Registro completado',
    'user/new_request_friendship' => 'Tienes una nueva solicitud de amistad',
    'user/friendship_accepted' => 'Te han aceptado la solicitud de amistad',
    //'user/friendship_rejected' => 'Te han rechazado la solicitud de amistad',
    'admin/new_list_created' => 'Se ha creado una nueva lista',
    'user/new_list_created' => 'Tu lista se ha creado correctamente',
    'user/friend_new_list' => 'Un amigo ha creado una nueva lista',
    'user/friend_changed_list' => 'Un amigo ha modificado una lista',
    'user/friend_closed_list' => 'Un amigo ha cerrado o eliminado una lista',
    //'user/friend_almost_close_list' => 'Se está a punto de cerrar la lista de un amigo',
    'user/remember_birthday' => 'Se acerca tu cumpleaños',
    'user/remember_christmas' => 'Se acerca la navidad',
  );

  static $emails_configuration=array(
    'new_request_friendship' => 'Nueva solicitud de amistad',
    'friendship_accepted' => 'Solicitud de amistad aceptada',
    //'friendship_rejected' => 'Solicitud de amistad rechazada',
    'new_list_created' => 'Confirmación al crear una nueva lista',
    'friend_new_list' => 'Un amigo ha publicado una nueva lista',
    'friend_changed_list' => 'Un amigo ha modificado una lista',
    'friend_closed_list' => 'Un amigo ha cerrado la lista',
    //'friend_almost_close_list' => 'Una lista de un amigo está a punto de cerrarse',
    'remember_birthday' => 'Recordatorio cuando se acerca tu cumpleaños',
    'remember_christmas' => 'Recordatorio cuando se acerca navidades',
  );

  public function __construct() {
    add_filter('wp_mail_from', array($this, 'change_from_email'), 50);
    add_filter('wp_mail_from_name', array($this, 'change_from_name'), 50);
    add_action('admin_menu', array($this, 'menu_email_test'));
    add_action('init', array($this, 'send_email_test'));
  }

  public static function menu_email_test() {
    add_menu_page('Emails test', 'Emails test', 'manage_options', 'emails_page', array($this, 'test_emails_page') );
  }

  public static function test_emails_page() {
    echo '<h3>Emails test</h3>
    <form name="" method="post">
    <p>Email template: </p>
    <select name="email_template">';
    foreach (self::$emails_templates as $key => $template) {
      echo '<option value="'.$key.'">'.$template.' '.$key.'</option>';
    }
    echo '</select>
    <br/><br/>
    <p>User: </p>
    <select name="user_id">';
    foreach (get_users() as $user) {
      echo '<option value="'.$user->ID.'">'.$user->ID.' - '.$user->display_name.'</option>';
    }
    echo '</select>
    <br/><br/>Email: <input type="text" name="email_test" value="">
    <input type="submit" value="Enviar/Probar">
    </form>';
  }

  public static function send_email_test() {
    if (isset($_POST['email_test'])) {
      if ($_POST['email_test']=='') {
        echo self::get_email_body($_POST['email_template'], array('user_id' => $_POST['user_id']));
      } else {
        LR_Emails::send_email($_POST['user_id'], $_POST['email_template'], array('user_id' => $_POST['user_id']), $_POST['email_test']);
      }
    }
  }

  public static function change_from_email($from_email) {
    return 'info@lista-regalos.com';
  }

  public static function change_from_name($from_name) {
    return 'Lista de regalos';
  }

  public static function get_email_title_email($template) {
    if( array_key_exists( $template, self::$emails_templates ) ) {
      $title = self::$emails_templates[$template];
      return $title;
    }
    return false;
  }

  public static function get_email_body($template, $variables) {
    $email_template_path=LR_TEMPLATES_DIR.'emails/';
    if( array_key_exists( $template, self::$emails_templates ) ) {
      ob_start();
      $template_header = $email_template_path . 'email-header.php';
      $template_footer = $email_template_path . 'email-footer.php';
      $template_file = $email_template_path . $template . '.php';
      if( file_exists( $template_file ) ) {
        include $template_header;
        include $template_file;
        include $template_footer;
        $body =ob_get_clean();
        return $body;
      }
    }
    return false;
  }

  public static function send_email($user_id, $template, $variables='', $email=false) {
    if ($user_id=='admin' || LR_User::get_email_send($user_id, $template) || $email) {
      if ($user_id!='admin' && !$email) {
        $template='user/'.$template;
      }
      $headers = array('Content-Type: text/html; charset=UTF-8');
      if( array_key_exists( $template, self::$emails_templates ) ) {
        $title=self::get_email_title_email($template);
        $body=self::get_email_body($template, $variables);
        $body=self::transform_css_to_inline($body);
        if (!$email) {
          $email=LR_User::get_user_email_address($user_id);
        }
        if ( $body && !wp_mail( $email, wp_specialchars_decode( __($title, 'lr') ), $body , $headers) ) {
        } else {
          return true;
        }
      }
    } else {
      return false;
    }
  }

  public static function transform_css_to_inline($content) {
    $email_template_path=LR_TEMPLATES_DIR.'emails/';
    $template_styles = $email_template_path . 'styles.php';
    ob_start();
    include $template_styles;
    $css =ob_get_clean();
    $emogrifier_class = '\\Pelago\\Emogrifier';
    if ( ! class_exists( $emogrifier_class ) ) {
      include_once LR_VENDORS_DIR . '/emogrifier/class-emogrifier.php';
    }
    try {
      $emogrifier = new $emogrifier_class( $content, $css );
      $content    = $emogrifier->emogrify();
    } catch ( Exception $e ) {
    }
    return $content;
  }

}

new LR_Emails();

?>
