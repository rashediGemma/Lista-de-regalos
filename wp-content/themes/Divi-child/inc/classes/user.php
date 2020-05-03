<?php
// FILE TO INCLUDE ALL SINGLE USER (user object) functionality, used when user is logged in

class LR_User {

  public $user_id=false;

  function __construct($user_id=false){
    add_action( 'register_new_user', array($this, 'send_email_user') );
    add_action( 'init', array($this, 'save_configuration'));
    add_action( 'init', array($this, 'save_profile'));

    add_action( 'wp_ajax_save_profile_image', array($this, 'save_profile_image'), 10);
    add_action( 'wp_ajax_nopriv_save_profile_image', array($this, 'save_profile_image'), 10);
  }


  public static function get_user_photo($user_id=false){
    if (!$user_id) {
      $user_id=get_current_user_id();
    }
    $img_id=get_user_meta($user_id, 'lr_user_avatar', true);
    if ($img_id>0) {
      $img=wp_get_attachment_image_src($img_id, 'full');
      return $img[0];
    } else {
      return CHILD_PATH . '/assets/img/profile_picture.png';
    }
  }

  public static function get_email_send($user_id, $email) {
    $emails_must=array('user/new_user');
    if (in_array($email, $emails_must)) {
      return true;
    } else {
      return get_user_meta($user_id, 'lr_emails_'.$email, true);
    }
  }

  public static function get_notification_send($user_id, $notification) {
    return get_user_meta($user_id, 'lr_notifications_'.$notification, true);
  }

  public static function send_email_user($user_id) {
    LR_Emails::send_email('admin', 'admin/new_user', array('user_id' => $user_id));
    LR_Emails::send_email($user_id, 'user/new_user', array('user_id' => $user_id));
    self::check_all_notificacions_emails($user_id);
  }

  public static function get_user_email_address($user_id) {
    if ($user_id=='admin') {
      $user_id=1;
    }
    $user = get_userdata( $user_id );
    return $user->user_email;
  }

  public static function check_all_notificacions_emails($user_id) {
    foreach (LR_Emails::$emails_configuration as $key => $email) {
      update_user_meta($user_id, 'lr_emails_'.$key, 1);
    }
    foreach (LR_Notifications::$notifications_configuration as $key => $notification) {
      update_user_meta($user_id, 'lr_notifications_'.$key, 1);
    }
  }

  public static function save_configuration() {
    if (isset($_POST['configuration_type'])) {
      if ($_POST['configuration_type']=='lr_emails') {
        foreach (LR_Emails::$emails_configuration as $key => $email) {
          if (!isset($_POST['lr_emails_'.$key])) {
            update_user_meta(get_current_user_id(), 'lr_emails_'.$key, 0);
          } else {
            update_user_meta(get_current_user_id(), 'lr_emails_'.$key, $_POST['lr_emails_'.$key]);
          }
        }
      } else if ($_POST['configuration_type']=='lr_notifications') {
        foreach (LR_Notifications::$notifications_configuration as $key => $notification) {
          if (!isset($_POST['lr_notifications_'.$key])) {
            update_user_meta(get_current_user_id(), 'lr_notifications_'.$key, 0);
          } else {
            update_user_meta(get_current_user_id(), 'lr_notifications_'.$key, $_POST['lr_notifications_'.$key]);
          }
        }
      }
    }
  }

  public static function save_profile() {
    if (isset($_POST['profile_settings'])) {
      $fields=array('first_name', 'last_name', 'birthday', 'phone', 'address', 'city', 'country', 'postal_code', 'how_you_meet_us');
      foreach ($fields as $field) {
        update_user_meta(get_current_user_id(), $field, $_POST[$field]);
      }
    }
  }

  public static function save_profile_image() {
    if(isset($_POST["image"])) {
      $user = get_userdata( get_current_user_id() );
      $data = $_POST["image"];
      list($type, $data) = explode(';', $data);
      list($none, $data)      = explode(',', $data);
      $type=str_replace("data:", "", $type);
      $format=explode("/", $type);
      $decoded = base64_decode($data);
      $filename         = $user->user_login.'.'.$format[1];
      $upload_dir       = wp_upload_dir();
      $upload_path      = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;
      $hashed_filename  = $filename;
      $image_upload=file_put_contents($upload_path.$hashed_filename, $decoded);
      $attachment = array(
        'post_mime_type' => $type,
        'post_title' => $hashed_filename,
        'post_content' => '',
        'post_status' => 'inherit',
        'guid' => $upload_dir['url'] . '/' . basename($hashed_filename)
      );
      $attach_id = wp_insert_attachment( $attachment, $upload_dir['path'] . '/' . $hashed_filename );
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata( $attach_id, $upload_dir['path'] . '/' . $hashed_filename  );
      wp_update_attachment_metadata( $attach_id, $attach_data );
      update_user_meta(get_current_user_id(), 'lr_user_avatar', $attach_id);
    }
    wp_die();

  }


}

new LR_User();


?>
