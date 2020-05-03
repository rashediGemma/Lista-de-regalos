<?php
class LR_Gifts {

  public static $cpt_slug = 'lr_gifts';

  function __construct($user_id=false){
    add_action('init', array($this,'register_post_type'));

    add_action( 'wp_ajax_mark_gift_buyed', array($this, 'mark_gift_buyed'), 10);
    add_action( 'wp_ajax_nopriv_mark_gift_buyed', array($this, 'mark_gift_buyed'), 10);

    add_action( 'wp_ajax_mark_gift_unbuyed', array($this, 'mark_gift_unbuyed'), 10);
    add_action( 'wp_ajax_nopriv_mark_gift_unbuyed', array($this, 'mark_gift_unbuyed'), 10);
  }

  public function register_post_type() {
    // Register CPT
    register_post_type(
      self::$cpt_slug,
      array(
        'labels' => array(
          'name' => 'Regalos',
          'singular_name' => 'Regalo',
        ),
        'description' => '',
        'public' => false,
        'has_archive' => false,
        'menu_position' => 30,
        'show_ui' => true,
        'supports' => array( 'title' ),
      )
    );
  }

  public static function insert_new_gift($list_id, $x) {
    $id = wp_insert_post(array(
      'post_title'=>$_POST['gift_name'][$x],
      'post_type'=>self::$cpt_slug,
      'post_status'=>  'publish',
      'post_author' => get_current_user_id(),
    ));
    $config_gifts=LR_Tools::get_config('my_list_gifts_form' );
    add_post_meta($id, 'list_id', $list_id);
    foreach ($config_gifts as $field) {
      if (isset($_POST[$field['name']][$x])) {
        add_post_meta($id, $field['name'], $_POST[$field['name']][$x]);
      }
    }
  }

  public static function update_gift($x, $gift_id) {
    $config_gifts=LR_Tools::get_config('my_list_gifts_form' );
    foreach ($config_gifts as $field) {
      if (isset($_POST[$field['name']][$x])) {
        update_post_meta($gift_id, $field['name'], $_POST[$field['name']][$x]);
      }
    }
  }

  public static function delete_gift($gift_id) {
    wp_delete_post($gift_id, true);
  }

  public static function get_gifts_list($list_id) {
    $posts = get_posts(array(
      'post_type'=>self::$cpt_slug,
      'post_status'=>  'publish',
      'fields' => 'ids',
      'post_author' => get_current_user_id(),
      'numberposts' => -1,
      'meta_query' => array(
        array(
            'key' => 'list_id',
            'value' => $list_id
        )
    )
    ));
    return $posts;
  }

  public static function get_gifts_buyed_list($list_id) {
    if (get_post_meta($list_id, 'gifts_buyed', true)!='false') {
      $posts = get_posts(array(
        'post_type'=>self::$cpt_slug,
        'post_status'=>  'publish',
        'fields' => 'ids',
        'post_author' => get_current_user_id(),
        'numberposts' => -1,
        'meta_query' => array(
          array(
              'key' => 'list_id',
              'value' => $list_id
          ),
          array(
              'key' => 'gift_buyed',
              'value' => 'buyed'
          )
      )
      ));
      return count($posts);
    } else {
      return __('No se quiere visualizar', 'lr');
    }

  }

  public static function get_value($value, $gift_id) {
    return get_post_meta($gift_id, $value, true);
  }

  public static function convert_link($link) {
    if ($link!='' || strpos($link, "amazon")!==false) {
      $asin = substr(strstr($link,"p/"),2,10);
      $link='//rcm-eu.amazon-adsystem.com/e/cm?lt1=_blank&bc1=FFFFFF&IS2=1&bg1=FFFFFF&fc1=000000&lc1=0000FF&t=listaregalos-21&language=es_ES&o=30&p=8&l=as4&m=amazon&f=ifr&ref=as_ss_li_til&asins='.$asin.'';
      echo '<iframe style="width:120px;height:250px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="'.$link.'"></iframe>';
    }
  }

  public static function mark_gift_buyed() {
    update_post_meta($_POST['gift_id'], 'gift_buyed', 'buyed');
    update_post_meta($_POST['gift_id'], 'gift_buyed_by', get_current_user_id());
    update_post_meta($_POST['gift_id'], 'gift_buyed_by_show', $_POST['show_name']);
    echo __('Comprado', 'lr');
    LR_Shoppings::insert_new_shopping_from_list(get_current_user_id(), $_POST['gift_id']);
    wp_die();
  }

  public static function mark_gift_unbuyed() {
    $shopping_id=get_post_meta($_POST['gift_id'], 'gift_buyed_shopping_id', true);
    delete_post_meta($_POST['gift_id'], 'gift_buyed');
    delete_post_meta($_POST['gift_id'], 'gift_buyed_by');
    delete_post_meta($_POST['gift_id'], 'gift_buyed_by_show');
    delete_post_meta($_POST['gift_id'], 'gift_buyed_shopping_id');
    echo __('Comprar', 'lr');
    LR_Shoppings::delete_shopping_from_list($shopping_id);
    wp_die();
  }

}

new LR_Gifts();

?>
