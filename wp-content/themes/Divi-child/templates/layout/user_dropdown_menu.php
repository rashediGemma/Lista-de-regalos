<?php
$menu_items=LR_Tools::get_config('dropdown_menu' );
?>

<div class="user">
	<div class="photo">
		<img src="<?=LR_User::get_user_photo();?>">
	</div>
	<div class="user-info">
		<a data-toggle="collapse" href="" data-target="#lr_user_navigation" class="username" role="button" aria-expanded="false" aria-controls="lr_user_navigation">
			<span><?php the_author_meta( 'first_name', get_current_user_id() ); ?> <?php the_author_meta( 'last_name', get_current_user_id() );?><b class="caret"></b></span>
		</a>
		<div class="collapse" id="lr_user_navigation">
			<ul class="nav nav-menu">
				<?php
				foreach($menu_items as $item_key=>$item){
					$link='#';
					if(array_key_exists('link', $item)){
						$link=$item['link'];
					}	elseif(array_key_exists('page_id', $item)){
						$link=get_permalink($item['page_id']);
						if(get_queried_object_id()==$item['page_id']){
							$active_item='active-item';
						}
					}
					echo '<li><a class="dropdown-item" href="'.$link.'"><span class="sidebar-normal">'.$item['menu_title'].'</span></a></li>';
				}
				?>
			</ul>
		</div>
	</div>
</div>
