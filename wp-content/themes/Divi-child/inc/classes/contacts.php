<?php

class LR_Contacts {

  public static $friends_meta='lr_friends';

  public function __construct() {

    add_action( 'wp_ajax_search_users', array($this, 'search_users'), 10);
    add_action( 'wp_ajax_nopriv_search_users', array($this, 'search_users'), 10);

    add_action( 'wp_ajax_add_friendship', array($this, 'add_friendship'), 10);
    add_action( 'wp_ajax_nopriv_add_friendship', array($this, 'add_friendship'), 10);

    add_action('init', array($this, 'custom_rewrite_rule'), 10, 0);

  }

  public static function custom_rewrite_rule() {
    add_rewrite_tag('%user_id%','([^&]+)');
    add_rewrite_rule('^listas/(.+)_(.+)?$','index.php?page_id=151&user_id=$matches[2]','top');
  }

  public static function add_friendship() {
    if ($_POST['status']=='new') {
      self::add_friend_to_user(get_current_user_id(), $_POST['id_user'], 'waiting');
      self::add_friend_to_user($_POST['id_user'], get_current_user_id(), 'pending');
      LR_Emails::send_email($_POST['id_user'], 'user/new_request_friendship', array('user_id' => get_current_user_id()));
      LR_Notifications::add_new_notification($_POST['id_user'], 'new_request_friendship');
    } else if ($_POST['status']=='rejected') {
      self::add_friend_to_user(get_current_user_id(), $_POST['id_user'], 'rejected');
      self::add_friend_to_user($_POST['id_user'], get_current_user_id(), 'rejected');
      LR_Emails::send_email($_POST['id_user'], 'user/friendship_rejected', array('user_id' =>$_POST['id_user'], 'other_user' => get_current_user_id()));
      LR_Notifications::add_new_notification($_POST['id_user'], 'friendship_rejected');
    } else if ($_POST['status']=='accepted') {
      self::add_friend_to_user(get_current_user_id(), $_POST['id_user'], 'accepted');
      self::add_friend_to_user($_POST['id_user'], get_current_user_id(), 'accepted');
      LR_Emails::send_email($_POST['id_user'], 'user/friendship_accepted', array('user_id' => $_POST['id_user'], 'other_user' => get_current_user_id()));
      LR_Notifications::add_new_notification($_POST['id_user'], 'friendship_accepted', array('user_id' => get_current_user_id()));
      LR_Notifications::add_new_notification(get_current_user_id(), 'friendship_accepted', array('user_id' => $_POST['id_user']));
    }
    $link=get_permalink( get_page_by_path( 'contactos' ));
    return true;
    wp_die();
  }

  public static function add_friend_to_user($current_user, $user_id, $status) {
    $contacts=self::get_my_contacts($current_user);
    $key_user=array_search($user_id, array_column($contacts, 'user_id'));
    if(strlen($key_user)>0) {
      $contacts[$key_user]['status']=$status;
      update_user_meta($current_user, self::$friends_meta, $contacts);
    } else {
      $contacts[]=array(
        'user_id' => $user_id,
        'status' => $status,
      );
      update_user_meta($current_user, self::$friends_meta, $contacts);
    }
  }

  public static function get_contacts($k) {
    global $wpdb;
    $sql="select A.ID as user_id, A.user_nicename, A.user_email, B.meta_value as name, C.meta_value as surname from ".$wpdb->users." as A
    inner join ".$wpdb->usermeta." as B on A.ID=B.user_id and B.meta_key='first_name'
    inner join ".$wpdb->usermeta." as C on A.ID=C.user_id and C.meta_key='last_name'
    where ((A.user_nicename like '".$k."%') or (A.user_email like '".$k."%') or (B.meta_value like '".$k."%')) and A.ID!=".get_current_user_id()." and A.ID!=1";
    $res=$wpdb->get_results($sql);
    return $res;
  }

  public static function get_my_contacts($user_id=false, $status='all') {
    if (!$user_id) {
      $user_id=get_current_user_id();
    }
    $contacts=get_user_meta($user_id, self::$friends_meta, true);
    if ($contacts=='') {
      $contacts=array();
    }
    if ($status!='all') {
      foreach ($contacts as $key => $contact) {
        if ($contact['status']!=$status) {
          unset($contacts[$key]);
        }
      }
    }
    return $contacts;
  }

  public static function search_users() {
    $contacts=self::get_contacts($_POST['k']);
    $my_contacts=self::get_my_contacts();
    if (count($contacts)==0) {
      echo __('No se ha encontrado ningún usuario registrado con este nombre/email', 'lr');
    } else {
      echo '<div class="row">';
      foreach ($contacts as $contact) {
        $key_user=array_search($contact->user_id, array_column($my_contacts, 'user_id'));
        $is_friend=false;
        if (strlen($key_user)>0) {
          $is_friend=true;
        }
        echo '<div class="col-12">
        <div class="row lr_results_user">
        <div class="col-3 col-sm-2">
        <img src="'.LR_User::get_user_photo($contact->user_id).'" class="lr_results_user_image img-fluid">
        </div>
        <div class="col-7 col-sm-8">
        <h4 class="lr_results_user_name">'.$contact->name.' '.$contact->surname.'<span class="lr_results_user_nicename"> - '.$contact->user_nicename.'</span></h6>
        <h6 class="lr_results_user_email">'.$contact->user_email.'</h6>
        </div>
        <div class="col-2">';
        if ($is_friend) {
          echo '<i class="fas fa-user-friends '.$my_contacts[$key_user]['status'].'"></i>';
        } else {
          echo '<i class="fas fa-user-plus add_friendship" data-user="'.$contact->user_id.'"></i>';
        }
        echo '<span></span>
        </div>
        </div>
        </div>';
      }
      echo '</div>';
    }
    wp_die();
  }


}

new LR_Contacts();
