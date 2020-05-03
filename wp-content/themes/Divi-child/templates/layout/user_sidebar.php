<?php
global $page_key;
$menu_items=LR_Tools::get_config('sidebar_menu' );
?>

<div class="sidebar-wrapper">
	<ul class="nav">
	<?php
	foreach($menu_items as $key => $item){
		$link='#';
		if (array_key_exists('post_name', $item)){
			$link=get_permalink( get_page_by_path( $item['post_name'] ) );
		}
		$active='';
		if ($key==$page_key) {
			$active='active';
		}
	?>
		<li class="nav-item <?=$active;?>">
			<a href="<?=$link;?>" class="nav-link">
				<i class="<?=$item['icon'];?>"></i>
				<p><?=$item['menu_title'];?></p>
			</a>
		</li>
	<?php } ?>
	</ul>
</div>
