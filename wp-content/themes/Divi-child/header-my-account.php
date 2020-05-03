<?php

/**
* The template for displaying the header.
*
* @package GeneratePress
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="perfect-scrollbar-on">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	if(!is_user_logged_in()){
		wp_die('only logged in users');
	}

	?>

	<div class="wrapper">
		<div class="sidebar" data-color="azure" data-background-color="white">
			<div class="logo text-center">
				<a href="<?=get_permalink( get_page_by_path( 'mis-listas' ) );?>" class="lr-main-header__logo">
					<img src="<?=esc_attr( LR_Layout::get_logo()); ?>" alt="<?=esc_attr( get_bloginfo( 'name' ) ); ?>" class="img-fluid">
				</a>
			</div>
			<?php LR_Layout::display_user_dropdown_menu(); ?>
			<?php LR_Layout::display_user_sidebar(); ?>
		</div>
		<div class="main-panel">
			<?php LR_Layout::display_user_menu_top(); ?>
			<?php
			do_action( 'generate_inside_container' );
