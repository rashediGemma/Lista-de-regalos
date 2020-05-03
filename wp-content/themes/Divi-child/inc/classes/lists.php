<?php
// FILE TO ADD TOOL FUNCTIONS


class LR_Lists {

  public static $cpt_slug = 'lr_lists';
  public static $status = array(
    'publish' => array(
      'name' => 'Publicada',
      'actions' => array('edit', 'delete', 'draft', 'archive'),
    ),
    'draft' => array(
      'name' => 'Privada',
      'actions' => array('edit', 'delete', 'publish'),
    ),
    'private' => array(
      'name' => 'Cerrada',
      'actions' => array('delete', 'publish'),
    )
  );

  function __construct($user_id=false){
    add_action('init', array($this,'register_post_type'));
    add_action('init', array($this,'insert_new_list'));

    add_action( 'wp_ajax_delete_list', array($this, 'delete_list'), 10);
    add_action( 'wp_ajax_nopriv_delete_list', array($this, 'delete_list'), 10);
    add_action( 'wp_ajax_hide_list', array($this, 'hide_list'), 10);
    add_action( 'wp_ajax_nopriv_hide_list', array($this, 'hide_list'), 10);
    add_action( 'wp_ajax_archive_list', array($this, 'archive_list'), 10);
    add_action( 'wp_ajax_nopriv_archive_list', array($this, 'archive_list'), 10);
    add_action( 'wp_ajax_show_list', array($this, 'show_list'), 10);
    add_action( 'wp_ajax_nopriv_show_list', array($this, 'show_list'), 10);

    if (isset($_GET['id'])) {
      add_filter('pre_get_document_title', array($this, 'change_title_list'), 50, 1);
    }
  }

  public function register_post_type() {
    // Register CPT
    register_post_type(
      self::$cpt_slug,
      array(
        'labels' => array(
          'name' => 'Listas',
          'singular_name' => 'Lista',
        ),
        'description' => '',
        'public' => false,
        'has_archive' => false,
        'menu_position' => 30,
        'show_ui' => true,
        'supports' => array( 'title', 'author'),
      )
    );
  }

  public static function insert_new_list() {
    global $lr;
    if (isset($_POST['save_list'])) {
      if ($_POST['save_list']==0) {
        $id = wp_insert_post(array(
          'post_title'=>$_POST['title'],
          'post_type'=>self::$cpt_slug,
          'post_status'=>  'publish',
          'post_author' => get_current_user_id(),
        ));
        $config_about=LR_Tools::get_config('my_list_about_form' );
        foreach ($config_about as $field) {
          add_post_meta($id, $field['name'], $_POST[$field['name']]);
        }
        add_post_meta($id, 'list_identifier', self::create_unique_identifier_list($id));
        $number_gifts=$_POST['gifts_number'];
        if ($number_gifts>0) {
          foreach ($_POST['gift_name'] as $x => $gift_name) {
            LR_Gifts::insert_new_gift($id, $x);
          }
        }
        self::get_contacts_friends_to_send_email_notification('new', $id);
      } else {
        $id=$_POST['save_list'];
        $config_about=LR_Tools::get_config('my_list_about_form' );
        foreach ($config_about as $field) {
          if (isset($field['show_form'])) { continue; }
          update_post_meta($id, $field['name'], $_POST[$field['name']]);
        }
        $gifts_string=$_POST['array_gifts'];
        $gifts_array=explode(",", $gifts_string);
        $gifts_ids=$_POST['gift_id'];
        $saved_gifts=array();
        foreach ($_POST['gift_name'] as $x => $gift_name) {
          $exist = get_post($gifts_ids[$x]);
          if (!$exist || $exist->post_type!='lr_gifts') {
            LR_Gifts::insert_new_gift($id, $x);
          } else if (array_key_exists($x, $gifts_ids)) {
            $saved_gifts[]=$gifts_ids[$x];
            LR_Gifts::update_gift($x, $gifts_ids[$x]);
          } else {
            LR_Gifts::insert_new_gift($id, $x);
          }
        }
        foreach ($gifts_ids as $gifts_id) {
          if (!in_array($gifts_id, $saved_gifts)) {
            LR_Gifts::delete_gift($gifts_id);
          }
        }
        self::get_contacts_friends_to_send_email_notification('update', $id);
      }
      $link=get_permalink( get_page_by_path( 'mis-listas' ));
      wp_redirect($link);
      exit();
    }
  }

  public static function get_contacts_friends_to_send_email_notification($status, $list_id){
    if ($status=='new') {
      $template1='new_list_created';
      $template2='friend_new_list';
      LR_Emails::send_email('admin', 'admin/'.$template1, array('user_id' => get_current_user_id()));
    } else if ($status=='update') {
      $template1='';
      $template2='friend_changed_list';
    } else if ($status=='closed') {
      $template1='';
      $template2='friend_closed_list';
    }
    LR_Emails::send_email(get_current_user_id(), $template1, array('user_id' => get_current_user_id()));
    LR_Notifications::add_new_notification(get_current_user_id(), $template1);
    $contacts=LR_Contacts::get_my_contacts('','accepted');
    $send=true;
    foreach ($contacts as $contact) {
      $visibility=get_post_meta($list_id, 'visibility', true);
      if ($visibility=='contacts') {
        $contacts=get_post_meta($list_id, 'contacts', true);
        if (!in_array($contact['user_id'], $contacts)) {
          $send=false;
        }
      }
      if ($send) {
        LR_Emails::send_email($contact['user_id'], $template2, array('user_id' => $contact['user_id'], 'other_user' => get_current_user_id()));
        LR_Notifications::add_new_notification($contact['user_id'], $template2, array('user_id' => $contact['user_id'], 'other_user' => get_current_user_id()));
      }
    }
  }

  public static function create_unique_identifier_list($id) {
    return get_current_user_id().$id.date('mdY');
  }

  public static function get_lists($user_id, $status=array()) {
    $args=array(
      'post_type'=>self::$cpt_slug,
      'fields' => 'ids',
      'post_status' => array('publish', 'draft', 'private', 'trash'),
      'author' => $user_id,
      'numberposts' => -1
    );
    if ($status!='') {
      $args['post_status']=$status;
    }
    $posts=get_posts($args);
    if ($user_id!=get_current_user_id()) {
      foreach ($posts as $key => $post) {
        $visibility=get_post_meta($post, 'visibility', true);
        if ($visibility=='contacts') {
          $contacts=get_post_meta($post, 'contacts', true);
          if (!in_array(get_current_user_id(), $contacts)) {
            unset($posts[$key]);
          }
        }
      }
    }
    return $posts;
  }

  public static function get_columns_lists() {
    $config_about=LR_Tools::get_config('my_list_about_form' );
    return $config_about;
  }

  public static function delete_list() {
    $gifts=LR_Gifts::get_gifts_list($_POST['list']);
    foreach ($gifts as $gift) {
      wp_delete_post($gift, true);
    }
    wp_delete_post($_POST['list'], true);
    self::get_contacts_friends_to_send_email_notification('closed', $_POST['list']);
    wp_die();
  }

  public static function hide_list() {
    $post = array( 'ID' => $_POST['list'], 'post_status' => 'draft' );
    self::get_contacts_friends_to_send_email_notification('closed', $_POST['list']);
    wp_update_post($post);
    wp_die();
  }

  public static function archive_list() {
    $post = array( 'ID' => $_POST['list'], 'post_status' => 'private' );
    self::get_contacts_friends_to_send_email_notification('closed', $_POST['list']);
    wp_update_post($post);
    wp_die();
  }

  public static function show_list() {
    $post = array( 'ID' => $_POST['list'], 'post_status' => 'publish' );
    wp_update_post($post);
    wp_die();
  }

  public static function get_id_from_unique($identifier) {
    $posts = get_posts(array(
      'post_type'=>self::$cpt_slug,
      'post_status' => array('publish', 'draft', 'private', 'trash'),
      'post_author' => get_current_user_id(),
      'numberposts' => -1,
      'fields' => 'ids',
      'meta_query' => array(
        array(
          'key' => 'list_identifier',
          'value' => $identifier
        )
      )
    ));
    return $posts[0];
  }

  public static function get_value($value) {
    if (isset($_GET['id']) && !isset($_POST['save_list'])) {
      $list_id=self::get_id_from_unique($_GET['id']);
      return get_post_meta($list_id, $value, true);
    }
  }

  public static function change_title_list($title) {
    $title=get_post_meta(self::get_id_from_unique($_GET['id']), 'title', true);
    $title .= ' - '.get_bloginfo( 'name' );
    return $title;
  }

  public static function get_icons_functions($list, $status) {
    $actions=self::$status[$status]['actions'];
    foreach ($actions as $action) {
      if ($action=='edit') {
        echo '<a class="edit" href="'.get_permalink( get_page_by_path( 'nueva-lista' ) ).'?id='.get_post_meta($list, 'list_identifier', true).'"><i class="fas fa-pencil-alt" data-toggle="tooltip" title="'.__('Editar lista', 'lr').'"></i></a>';
      } else if ($action=='delete') {
        echo '<i class="fas fa-trash" data-list="'.$list.'" data-toggle="tooltip" title="'.__('Eliminar lista', 'lr').'"></i>';
      } else if ($action=='draft') {
        echo '<i class="fas fa-eye-slash" data-list="'.$list.'" data-toggle="tooltip" title="'.__('Esconder lista', 'lr').'"></i>';
      } else if ($action=='publish') {
        echo '<i class="fas fa-eye" data-list="'.$list.'" data-toggle="tooltip" title="'.__('Publicar lista', 'lr').'"></i>';
      } else if ($action=='archive') {
        echo '<i class="fas fa-folder" data-list="'.$list.'" data-toggle="tooltip" title="'.__('Cerrar lista', 'lr').'"></i>';
      }
    }
  }

  public static function archive_all_lists_date_finish_today() {
    $posts = get_posts(array(
      'post_type'=>self::$cpt_slug,
      'post_status' => array('publish', 'draft', 'trash'),
      'numberposts' => -1,
      'fields' => 'ids',
      'meta_query' => array(
        array(
          'key' => 'date',
          'value' => date('d/m/Y')
        )
      )
    ));
    foreach ($posts as $post) {
      $post = array( 'ID' => $post, 'post_status' => 'private' );
      wp_update_post($post);
    }
  }

  public static function show_visibility_list($value, $list) {
    if ($value=='public') {
      echo __('Todos los contactos', 'lr');
    } else {
      $contacts=get_post_meta($list, 'contacts', true);
      echo __('Solo estos contactos', 'lr');
      $contacts_string='';
      foreach ($contacts as $contact) {
        $contacts_string.=get_user_meta($contact, 'first_name', true).' '.get_user_meta($contact, 'last_name', true).'<br/>';
      }
      echo '<i class="fas fa-info" data-toggle="tooltip" data-html="true" title="'.$contacts_string.'">';
    }
  }

  public static function get_contacts_for_list() {
    $contacts=LR_Contacts::get_my_contacts('','accepted');
    $array=array();
    foreach ($contacts as $contact) {
      $array[$contact['user_id']]=get_user_meta($contact['user_id'], 'first_name', true).' '.get_user_meta($contact['user_id'], 'last_name', true);
    }
    return $array;
  }

}

new LR_Lists();

?>
