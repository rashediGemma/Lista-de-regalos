<?php
$config=array(
	'profile_picture'=>array(
		'link'=>get_permalink( get_page_by_path( 'mi-perfil' )),
		'menu_title'=>__('Mi perfil','lr'),
	),
	'configuration'=>array(
		'link'=>get_permalink( get_page_by_path( 'configuracion' )),
		'menu_title'=>__('Configuración','lr'),
	),
	'logout'=>array(
		'link'=>wp_logout_url(home_url()),
		'menu_title'=>__('Salir','lr'),
	),
);
?>
