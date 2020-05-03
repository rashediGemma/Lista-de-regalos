<?php
// FILE TO ADD TOOL FUNCTIONS


class LR_Layout {

  public function __construct() {

    add_action( 'init', array($this,'disable_admin_bar') );
    add_action( 'login_enqueue_scripts', array($this,'my_login_logo') );
    add_action( 'login_headerurl', array($this,'my_login_logo_url') );
    add_action( 'login_headertitle', array($this,'my_login_logo_url_title') );
    add_action( 'login_header', array($this,'change_login_form_top'), 10 );
    add_action( 'login_link_separator', array($this,'remove_separator'), 10, 1 );
    add_filter( 'login_redirect', array($this,'redirect_url_after_login') );

  }

  public static function display_user_sidebar() {
    LR_Tools::load_template('layout/user_sidebar');
  }

  public static function display_user_dropdown_menu() {
    LR_Tools::load_template('layout/user_dropdown_menu');
  }

  public static function display_user_menu_top() {
    LR_Tools::load_template('layout/user_menu_top');
  }

  public static function disable_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
  }

  public static function redirect_url_after_login() {
    return get_permalink( get_page_by_path( 'mis-listas' ));
  }

  public static function get_logo() {
    $logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && ! empty( $user_logo )
    ? $user_logo
    : get_template_directory_uri() . '/images/logo.png';
    return $logo;
  }

  public static function get_logo_white() {
    return get_stylesheet_directory_uri() . '/assets/img/logo_white.png';
  }

  public static function my_login_logo() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/lr_login_styles.css' );
  }

  public static function my_login_logo_url() {
    return home_url();
  }

  public static function my_login_logo_url_title() {
    return 'Lista de regalos';
  }

  public static function change_login_form_top() { ?>
    <div class="container-fluid secureHeader">
      <div class="secureHeader__content">
        <a title="Lista de Regalos" class="secureHeader__logo" href="<?=home_url();?>">
          <img alt="logo" src="<?=self::get_logo();?>">
        </a>
        <?php if (!isset($_GET['action'])) {
          echo '<a class="secureHeader__sign_link__link" href="'.wp_login_url().'?action=register">'.__('Registrarse', 'lr').'</a>';
        } else {
          echo '<a class="secureHeader__sign_link__link" href="'.wp_login_url().'">'.__('Iniciar sesión', 'lr').'</a>';
        }
        ?>
      </div>
    </div>
  </div>
  <div class="title-login">
    <?php if (!isset($_GET['action'])) { ?>
      <h1 class="title-login__title"><?=__('Inicia sesión', 'lr');?></h1>
      <div class="header-block__line"></div>
      <p class="title-login__description"><?=__('¡Hola de nuevo!', 'lr');?></p>
    <?php } else { ?>
      <h1 class="title-login__title"><?=__('Registrarse', 'lr');?></h1>
      <div class="header-block__line"></div>
      <p class="title-login__description"><?=__('¡Empieza a compartir tus listas de regalos!', 'lr');?></p>
    <?php } ?>
  </div>
<?php }

  public static function remove_separator($separator) {
    return '';
  }

}

new LR_Layout();

?>
