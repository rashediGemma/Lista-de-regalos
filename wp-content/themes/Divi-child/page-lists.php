<?php
/**
 * Template Name: Listas
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit; // Exit if accessed directly.
 }

 global $page_key;
 $page_key='contacts';
 $user_id=get_query_var( 'user_id' );
 if (!$user_id) {
   wp_redirect(get_permalink(get_page_by_path('contactos')));
   exit();
 }
 $lists=LR_Lists::get_lists($user_id, array('private', 'publish'));
 get_header('my-account'); ?>

 	<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 gifts-legend">
          <div><div class="buyed gift-legend-bc"></div><span><?=__('Lista cerrada o regalo comprado', 'lr');?></span></div>
          <div><div class="must gift-legend-bc"></div><span><?=__('Importancia regalo alta', 'lr');?></span></div>
          <div><div class="want gift-legend-bc"></div><span><?=__('Importancia regalo media', 'lr');?></span></div>
        </div>
      </div>
      <div class="row lists-wrapper">
        <div class="col-12">
     			<?php
          if (!is_array($lists) || count($lists)==0) {
            echo '<br/><br/><h5>'.__('Aún no tiene listas creadas.', 'lr').'</h5>';
          } else {
            foreach ($lists as $list) { ?>
              <div class="card list-status-<?=get_post_status($list);?>">
                <div class="card-header" id="heading-<?=$list;?>">
                  <h5>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#<?=$list;?>" aria-controls="collapseOne">
                      <?=get_post_meta($list, 'title', true);?>
                    </button>
                  </h5>
                  <?php if (get_post_meta($list, 'date', true)!='') { ?>
                    <span class="list_date_close"><?=__('Fecha de cierre', 'lr');?><br/><?=get_post_meta($list, 'date', true);?></span>
                  <?php } ?>
                  <p class="list_description"><?=get_post_meta($list, 'description', true);?></p>
                </div>
                <div id="<?=$list;?>" class="collapse" aria-labelledby="heading-<?=$list;?>">
                  <div class="card-body">
                    <div class="row">
                      <?php $gifts=LR_Gifts::get_gifts_list($list);
                      if (!is_array($gifts) || count($gifts)==0) { ?>
                        <div class="col-12"><?=__('Aún no hay regalos añadidos en la lista', 'lr');?></div>
                      <?php }
                      foreach ($gifts as $gift) { ?>
                        <div class="col-12 col-sm-6 col-md-4" data-gift="<?=$gift;?>">
                          <div class="card list_gift_wrapper priority-<?=get_post_meta($gift, 'gift_priority', true);?> <?=get_post_meta($gift, 'gift_buyed', true);?>">
                            <div class="card-header" id="heading-<?=$gift;?>">
                              <h5>
                                <button class="btn btn-link" data-toggle="collapse" data-target="#<?=$gift;?>" aria-controls="collapseOne">
                                  <?=get_post_meta($gift, 'gift_name', true);?>
                                </button>
                              </h5>
                              <span class="gift_buy">
                                <?php if (get_post_meta($gift, 'gift_buyed', true)) { ?>
                                  <label><?=__('Comprado', 'lr');?></label>
                                  <?php if (get_current_user_id()==get_post_meta($gift, 'gift_buyed_by', true)) { ?>
                                    <i class="fas fa-undo-alt" data-gift="<?=$gift;?>"></i>
                                  <?php } else {
                                    if (get_post_meta($gift, 'gift_buyed_by_show', true)=='true') { ?>
                                      <i class="fas fa-info" data-toggle="tooltip" title="<?=get_user_meta(get_post_meta($gift, 'gift_buyed_by', true), 'first_name', true).' '.get_user_meta(get_post_meta($gift, 'gift_buyed_by', true), 'last_name', true);?>"></i>
                                    <?php }
                                  }?>
                                <?php } else { ?>
                                  <input type="checkbox" data-gift="<?=$gift;?>"><label><?=__('Comprar', 'lr');?></label>
                                <?php } ?>
                              </span>
                            </div>
                            <div id="<?=$gift;?>" class="collapse" aria-labelledby="heading-<?=$gift;?>">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-12"><?=get_post_meta($gift, 'gift_note', true);?></div>
                                  <?php $links=(Array)get_post_meta($gift, 'gift_link', true);
                                  foreach ($links as $link) {  ?>
                                    <div class="col-12"><?=LR_Gifts::convert_link($link);?></div>
                                  <?php }
                                  ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
          <?php } }
     			?>
        </div>
      </div>
    </div>
 	</div><!-- #primary -->

 <?php

 include('templates/modals/gift_name_buyed.php');
 get_footer('my-account');
