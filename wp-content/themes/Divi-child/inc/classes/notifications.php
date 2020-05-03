<?php
// FILE TO INCLUDE ALL NOTIFICATIONS FUNCTIONS

class LR_Notifications {

  static $notifications= array();

  static $notifications_configuration=array(
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
    self::$notifications= array(
      'new_request_friendship' => array(
        'text' => 'Tienes una nueva solicitud de amistad. Haz clic aquí para ir a tus solicitudes.',
        'url' =>get_permalink(get_page_by_path('contactos')),
      ),
      /*'friendship_rejected' => array(
        'text' => 'Se ha rechazado la solicitud de amistad.',
        'url' =>get_permalink(get_page_by_path('contactos')),
      ),*/
      'friendship_accepted' => array(
        'text' => 'La solicitud de amistad ha sido aceptada. ¡Ahora tú y {*USERNAME*} estáis conectados!',
        'url' =>get_permalink(get_page_by_path('contactos')),
      ),
      'new_list_created' => array(
        'text' => 'Has creado una nueva lista. Ya puedes ir agregando regalos',
        'url' =>get_permalink(get_page_by_path('mis-listas')),
      ),
      'friend_new_list' => array(
        'text' => '{*USERNAME*} ha creado una nueva lista.',
        'url' =>get_permalink(get_page_by_path('listas')),
      ),
      'friend_changed_list' => array(
        'text' => '{*USERNAME*} ha modificado su lista.',
        'url' =>get_permalink(get_page_by_path('listas')),
      ),
      'friend_closed_list' => array(
        'text' => '{*USERNAME*} ha cerrado nueva lista.',
        'url' =>get_permalink(get_page_by_path('listas')),
      ),
      /*'friend_almost_close_list' => array(
        'text' => 'La lista de {*USERNAME*} está a punto de cerrarse.',
        'url' =>get_permalink(get_page_by_path('listas')),
      ),*/
      'remember_birthday' => array(
        'text' => 'Se acerca tu cumpleaños. ¿Por qué no creas una lista?',
        'url' =>get_permalink(get_page_by_path('mis-listas')),
      ),
      'remember_christmas' => array(
        'text' => 'Se acerca navidad. ¿Por qué no creas una lista?',
        'url' =>get_permalink(get_page_by_path('mis-listas')),
      ),
    );

    add_action( 'wp_ajax_notification_readed', array($this, 'notification_readed'), 10);
    add_action( 'wp_ajax_nopriv_notification_readed', array($this, 'notification_readed'), 10);
  }

  public static function add_new_notification($user_id, $notification, $variables='') {
    if (LR_User::get_notification_send($user_id, $notification)) {
      global $wpdb;
      $notification_url=self::$notifications[$notification]['url'];
      $notification_text=self::$notifications[$notification]['text'];
      if (isset($variables['user_id'])) {
        $name=get_user_meta($variables['user_id'], 'first_name', true).' '.get_user_meta($variables['user_id'], 'last_name', true);
        $notification_text=str_replace("{*USERNAME*}", $name, $notification_text);
      }
      $date=date('Y-m-d');
      $sql="insert into {$wpdb->prefix}notifications values (null, {$user_id}, '{$notification}', '{$notification_text}', 0, '{$date}', '{$notification_url}')";
      $wpdb->get_results($sql);
    }
  }

  public static function get_notifications() {
    global $wpdb;
    $sql="select * from {$wpdb->prefix}notifications where id_user=".get_current_user_id()." and readed=0 order by id_primary desc";
    $res=$wpdb->get_results($sql);
    return $res;
  }

  public static function notification_readed() {
    global $wpdb;
    $sql="update {$wpdb->prefix}notifications set readed=1 where id_primary=".$_POST['notification_id']."";
    $res=$wpdb->get_results($sql);
  }

}

new LR_Notifications();


?>
