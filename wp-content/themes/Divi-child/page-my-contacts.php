<?php
/**
* Template Name: Mis contactos
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

global $page_key;
$page_key='contacts';

get_header('my-account'); ?>

<?php LR_Layout::display_user_menu_top(); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row user-search-wrapper">
      <div class="col-12 col-md-7 user-search-input">
        <i class="fas fa-search"></i>
        <input id="user-search" class="lr_ajax_search" type="text" placeholder="<?=__('Busca...', 'lr');?>">
      </div>
      <div class="col-12 col-md-7 user-search-results">
        <span class="user-search-results__placeholder"><?=__('Busca por nombre, usuario o email', 'lr');?></span>
      </div>
    </div>
    <div class="row my_contacts_wrapper__contact">
      <?php
      $my_contacts=LR_Contacts::get_my_contacts();
      if (count($my_contacts)==0) {
        echo '<h4>'.__('Aún no tienes contactos agregados, busca algo y ¡empieza a contactar con amigos!', 'lr').'</h4>';
      } else {
        foreach ($my_contacts as $contact) {
          $user_data=get_user_by('id', $contact['user_id']);
          $user_nicename=$user_data->data->user_nicename; ?>

          <div class="col-12 col-sm-6 col-md-4 my_contacts_wrapper__contact">
            <?php if ($contact['status']=='accepted') { ?><a href="<?=get_permalink(get_page_by_path('listas')).$user_nicename.'_'.$contact['user_id'];?>"><?php } ?>
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <img src="<?=LR_User::get_user_photo($contact['user_id']);?>">
                  </div>
                  <p class="card-category"><?=__('Nº listas', 'lr');?></p>
                  <h3 class="card-title"><?=count(LR_Lists::get_lists($contact['user_id'], 'publish'));?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <span><?=get_user_meta($contact['user_id'], 'first_name', true).' '.get_user_meta($contact['user_id'], 'last_name', true);?></span>
                  </div>
                  <div class="actions">
                    <?php
                    if ($contact['status']=='accepted') { echo '<i class="fas fa-user-friends accepted"></i>'; }
                    else if ($contact['status']=='waiting') { echo '<i class="fas fa-user-friends waiting"></i>'; }
                    else if ($contact['status']=='pending') { echo '<i class="fas fa-check" data-user="'.$contact['user_id'].'"></i>';/*<i class="fas fa-times" data-user="'.$contact['user_id'].'"></i>';*/ }
                    else if ($contact['status']=='rejected') { }
                    ?>
                  </div>
                </div>
              </div>
            <?php if ($contact['status']=='accepted') { ?> </a><?php } ?>
          </div>
        <?php } } ?>
      </div>
    </div>
  </div><!-- #primary -->

  <?php

  get_footer('my-account');
