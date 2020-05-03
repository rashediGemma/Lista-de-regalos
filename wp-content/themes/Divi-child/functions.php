<?php

define('CHILD_PATH', get_stylesheet_directory_uri());
define('LR_TEMPLATES_DIR', dirname( __FILE__ ).'/templates/');
define('LR_CONFIG_DIR', dirname( __FILE__ ).'/inc/config/');
define('LR_VENDORS_DIR', dirname( __FILE__ ).'/inc/vendors/');

require('inc/init.php');

add_action('wp_enqueue_scripts', 'lr_enqueue_scripts');
function lr_enqueue_scripts() {
  wp_enqueue_script( 'lr_popper_script', CHILD_PATH.'/assets/js/popper.min.js', array('jquery') );
  wp_enqueue_script( 'lr_bootstrap_script', CHILD_PATH.'/inc/vendors/bootstrap/js/bootstrap.js', array('jquery') );
  wp_enqueue_script( 'lr_script', CHILD_PATH.'/assets/js/scripts.js', array('jquery') );
  wp_localize_script( 'lr_script', 'lr_js', array('ajaxurl' => admin_url('admin-ajax.php')));
  wp_enqueue_script( 'lr_bootstrap-material_script', CHILD_PATH.'/assets/js/bootstrap-material-design.min.js', array('jquery') );
  wp_enqueue_script( 'lr_scroll-bar_script', CHILD_PATH.'/assets/js/perfect-scrollbar.jquery.min.js', array('jquery') );
  wp_enqueue_script( 'lr_jquery-validate_script', CHILD_PATH.'/assets/js/jquery.validate.min.js', array('jquery') );
  wp_enqueue_script( 'lr_bootstrap-wizard_script', CHILD_PATH.'/assets/js/jquery.bootstrap-wizard.js', array('jquery') );
  wp_enqueue_script( 'lr_bootstrap-selectpicker_script', CHILD_PATH.'/assets/js/bootstrap-selectpicker.js', array('jquery') );
  wp_enqueue_script( 'lr_dashboard_script', CHILD_PATH.'/assets/js/material-dashboard.js', array('jquery'));
  wp_enqueue_script( 'lr_moment_script', CHILD_PATH.'/assets/js/moment.min.js', array('jquery') );
  wp_enqueue_script( 'lr_bootstrap-datetimepicker_script', CHILD_PATH.'/assets/js/bootstrap-datetimepicker.min.js', array('jquery') );
  wp_enqueue_script( 'lr_demo_script', CHILD_PATH.'/assets/js/demo.js', array('jquery'));
  wp_enqueue_style( 'lr_bootstrap_style', CHILD_PATH.'/inc/vendors/bootstrap/css/bootstrap.min.css' );
  wp_enqueue_style( 'lr_dashboard_style', CHILD_PATH.'/assets/css/material-dashboard.css' );
  wp_enqueue_style( 'lr_style', CHILD_PATH.'/lr_styles.css' );
  wp_enqueue_style( 'lr_fontawesome_style', CHILD_PATH.'/inc/vendors/fontawesome/css/all.min.css' );
  wp_enqueue_style( 'lr_croppie_style', CHILD_PATH.'/inc/vendors/croppie/croppie.css');
  wp_enqueue_script( 'lr_croppie_script', CHILD_PATH.'/inc/vendors/croppie/croppie.js');
}

remove_action( 'register_new_user', 'wp_send_new_user_notifications' );
remove_action( 'edit_user_created_user', 'wp_send_new_user_notifications', 10);
