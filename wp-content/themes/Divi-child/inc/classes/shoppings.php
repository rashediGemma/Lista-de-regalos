<?php
class LR_Shoppings {

  public static $cpt_slug = 'shoppings';

  function __construct(){
    add_action('init', array($this, 'insert_new_shopping'));
    add_action('init', array($this, 'change_contact_name'));

    add_action( 'wp_ajax_load_shoppings', array($this, 'load_shoppings'), 10);
    add_action( 'wp_ajax_nopriv_load_shoppings', array($this, 'load_shoppings'), 10);

    add_action( 'wp_ajax_get_total_year', array($this, 'get_total_year'), 10);
    add_action( 'wp_ajax_nopriv_get_total_year', array($this, 'get_total_year'), 10);

    add_action( 'wp_ajax_delete_shopping', array($this, 'delete_shopping'), 10);
    add_action( 'wp_ajax_nopriv_delete_shopping', array($this, 'delete_shopping'), 10);

    add_action( 'wp_ajax_edit_shopping', array($this, 'edit_shopping'), 10);
    add_action( 'wp_ajax_nopriv_edit_shopping', array($this, 'edit_shopping'), 10);
  }

  public static function get_shoppings() {
    global $wpdb;
    $sql="select * from {$wpdb->prefix}".self::$cpt_slug." where user_id=".get_current_user_id()."";
    $res=$wpdb->get_results($sql);
    return $res;
  }

  public static function get_shoppings_group_by($group, $order) {
    global $wpdb;
    $sql="select * from {$wpdb->prefix}".self::$cpt_slug." where user_id=".get_current_user_id()." group by ".$group." order by ".$group." ".$order."";
    $res=$wpdb->get_results($sql);
    return $res;
  }

  public static function insert_new_shopping() {
    if (isset($_POST['new_gift_shopping'])) {
      global $wpdb;
      $other_contact='';
      if (isset($_POST['person_name']) && $_POST['person_name']!='') {
        $other_contact=$_POST['person_name'];
      }
      $buyed=0;
      if (isset($_POST['buyed'])) {
        $buyed=1;
      }
      $sql="insert into {$wpdb->prefix}".self::$cpt_slug." values (null, ".get_current_user_id().", ".date('Y').", '".$_POST['person_id']."', '".$other_contact."', '".$_POST['name']."','".$_POST['price']."','".$buyed."')";
      $wpdb->get_results($sql);
      $link=get_permalink(get_page_by_path('mis-compras'));
      wp_redirect($link);
      exit();
    }
  }

  public static function insert_new_shopping_from_list($user_id, $gift_id) {
    global $wpdb;
    $author_id=get_post_field('post_author', $gift_id);
    $name=get_post_meta($gift_id, 'gift_name', true);
    $sql="insert into {$wpdb->prefix}".self::$cpt_slug." values (null, ".$user_id.", ".date('Y').", '".$author_id."', '', '".$name."','','1')";
    $wpdb->get_results($sql);
    $sql="select id_primary from {$wpdb->prefix}".self::$cpt_slug." order by id_primary desc limit 1";
    $res=$wpdb->get_results($sql);
    $shopping_id=$res[0]->id_primary;
    update_post_meta($gift_id, 'gift_buyed_shopping_id', $shopping_id);
  }

  public static function delete_shopping_from_list($shopping_id) {
    global $wpdb;
    $sql="delete from {$wpdb->prefix}".self::$cpt_slug." where id_primary='".$shopping_id."'";
    $wpdb->get_results($sql);
  }

  public static function delete_shopping() {
    global $wpdb;
    $sql="delete from {$wpdb->prefix}".self::$cpt_slug." where id_primary='".$_POST['id']."'";
    $wpdb->get_results($sql);
    self::get_total_year_person($_POST['person'], $_POST['year']);
    wp_die();
  }

  public static function edit_shopping() {
    global $wpdb;
    $sql="update {$wpdb->prefix}".self::$cpt_slug." set title='".$_POST['name']."', price='".$_POST['price']."', buyed=".$_POST['buyed']." where id_primary='".$_POST['id']."'";
    $wpdb->get_results($sql);
    self::get_total_year_person($_POST['person'], $_POST['year']);
    wp_die();
  }

  public static function get_total_year() {
    $gifts=self::get_gift_year($_POST['year']);
    $total=0;
    foreach ($gifts as $gift) {
      $total=$total+$gift->price;
    }
    echo ' '.$total." €";
    wp_die();
  }

  public static function get_total_year_person($person, $year) {
    $gifts=self::get_gift_person_year($person, $year);
    $total=0;
    foreach ($gifts as $gift) {
      $total=$total+$gift->price;
    }
    echo $total." €";
  }

  public static function load_shoppings() {
    $gifts=self::get_gift_year($_POST['year']);
    $persons=array();
    foreach ($gifts as $person) {
      if ($person->person_id!=0) {
        if (!in_array($person->person_id, $persons)) {
          $persons[]=$person->person_id;
        }
      } else if ($person->person_name!='') {
        if (!in_array($person->person_name, $persons)) {
          $persons[]=$person->person_name;
        }
      }
    }
    ?>
    <div class="row">
      <div class="col-12">
        <?php foreach ($persons as $person) {
          $name=$person;
          $icon='<a class="change_contact" href=""><i data-person_name="'.$name.'" class="fas fa-exchange-alt " data-toggle="tooltip" title="'.__('Cambia este contacto por uno de tu lista de contactos', 'lr').'"></i></a>';
          if(is_numeric($person)) {
            $name=get_user_meta($person, 'first_name', true).' '.get_user_meta($person, 'last_name', true);
            $icon='';
          }
          $id=str_replace(" ","",$name); ?>
          <div class="card">
            <div class="card-header" id="heading-<?=$id;?>">
              <h5>
                <button class="btn btn-link" data-toggle="collapse" data-target="#<?=$id;?>" aria-expanded="true" aria-controls="collapseOne">
                  <?=$name;?>
                </button>
                <?=$icon;?>
              </h5>
              <span class="total_person"><?=self::get_total_year_person($person, $_POST['year']);?></span>
            </div>
            <div id="<?=$id;?>" class="collapse show" aria-labelledby="heading-<?=$id;?>">
              <div class="card-body">
                <?php
                $gifts=self::get_gift_person_year($person, $_POST['year']);
                foreach ($gifts as $gift) { ?>
                  <div class="row gift-wrapper-id" data-gift="<?=$gift->id_primary;?>">
                    <input type="hidden" class="person_name" value="<?=$person;?>">
                    <div class="col-12 gift-wrapper">
                      <div class="row">
                        <div class="col-8 col-sm-7">
                          <input type="text" name="name" value="<?=$gift->title;?>" disabled>
                        </div>
                        <div class="col-4 col-sm-2">
                          <input type="text" name="price" value="<?=$gift->price;?>" disabled>€
                        </div>
                        <div class="col-8 col-sm-2">
                          <?php $checked=''; if ($gift->buyed==1) { $checked='checked'; } ?>
                          <input type="checkbox" name="buyed" value="1" disabled <?=$checked;?>><span class="buyed"><?=__('Comprado', 'lr');?></span>
                        </div>
                        <div class="col-4 col-sm-1">
                          <i class="fas fa-edit" data-gift="<?=$gift->id_primary;?>"></i>
                          <i class="fas fa-check" data-gift="<?=$gift->id_primary;?>"></i>
                          <i class="fas fa-trash" data-gift="<?=$gift->id_primary;?>"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }
                ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php wp_die();
  }

  public static function get_gift_person_year($person, $year) {
    global $wpdb;
    if (is_numeric($person)) {
      $where='and person_id="'.$person.'"';
    } else {
      $where='and person_name="'.$person.'"';
    }
    $sql="select * from {$wpdb->prefix}".self::$cpt_slug." where user_id=".get_current_user_id()." and year='".$year."' {$where}";
    $res=$wpdb->get_results($sql);
    return $res;
  }

  public static function get_gift_year($year) {
    global $wpdb;
    $sql="select person_id, person_name, price from {$wpdb->prefix}".self::$cpt_slug." where user_id=".get_current_user_id()." and year='".$year."'";
    $res=$wpdb->get_results($sql);
    return $res;
  }

  public static function change_contact_name() {
    if (isset($_POST['person_name'])) {
      global $wpdb;
      $sql="update {$wpdb->prefix}".self::$cpt_slug." set person_id='".$_POST['person_id']."', person_name='' where user_id=".get_current_user_id()." and person_name='".$_POST['person_name']."'";
      $res=$wpdb->get_results($sql);
    }

  }
}

new LR_Shoppings();
