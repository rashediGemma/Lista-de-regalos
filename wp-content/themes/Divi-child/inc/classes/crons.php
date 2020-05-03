<?php
class LR_Crons {

  public function __construct() {

    $this->events = [
      'data_list_archive' => [ 'daily', [ $this, 'data_list_archive' ] ],
      'birthday_remember' => [ 'daily', [ $this, 'birthday_remember' ] ],
      'christmas_remember' => [ 'daily', [ $this, 'christmas_remember' ] ],
    ];

    foreach ( $this->events as $slug => $data ) {
      list($frequency, $callback) = $data;
      add_action( $slug, $callback );
      if (isset($_GET[$slug])) {
        add_action('init', array($this, $slug));
      }
    }

  }

  public function data_list_archive() {
    LR_Lists::archive_all_lists_date_finish_today();
  }

  public function birthday_remember() {
    $days = date('d-m', strtotime(date('d-m-Y')));
    foreach (get_users() as $user) {
      $birthday=get_user_meta($user->ID, 'birthday', true);
      if ($birthday) {
        $birthday = str_replace('/', '-', $birthday);
        $birthday=date('d-m', strtotime($birthday.' -10 days'));
        if ($days==$birthday) {
          LR_Emails::send_email($user->ID, 'remember_birthday', array('user_id' => $user->ID));
          LR_Notifications::add_new_notification($user->ID, 'remember_birthday');
        }
      }
    }
  }

  public function christmas_remember() {
    if (date('m-d')=='24-11') {
      foreach (get_users() as $user) {
        LR_Emails::send_email($user->ID, 'remember_christmas', array('user_id' => $user->ID));
        LR_Notifications::add_new_notification($user->ID, 'remember_christmas');
      }
    }
  }

}

new LR_Crons();
