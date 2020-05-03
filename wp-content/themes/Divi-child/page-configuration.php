<?php
/**
* Template Name: Configuración
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

global $page_key;
$page_key='profile';

get_header('my-account'); ?>

<?php LR_Layout::display_user_menu_top(); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row configuration-wrapper">
      <div class="col-md-8 ml-auto mr-auto">
        <ul class="nav nav-pills nav-pills-azure nav-pills-icons justify-content-center" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="" data-target="#cnf_emails" role="tablist">
              <i class="fas fa-envelope-open-text"></i><?=__('Emails', 'lr');?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="" data-target="#cnf_notificaciones" role="tablist">
              <i class="fas fa-bell"></i><?=__('Notificaciones', 'lr');?>
            </a>
          </li>
        </ul>
        <div class="tab-content tab-space">
          <div class="tab-pane active" id="cnf_emails">
            <form name="configuration" method="post">
              <div class="card">
                <div class="row">
                  <div class="col-12 title">
                    <h4><?=__('Selecciona los emails que quieres recibir', 'lr');?></h4><br/>
                  </div>
                  <?php foreach (LR_Emails::$emails_configuration as $key => $email) {
                    $checked='checked';
                    if (get_user_meta(get_current_user_id(), "lr_emails_".$key, true)==0)  {
                      $checked='';
                    }
                    ?>
                    <div class="col-6 form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="1" name="lr_emails_<?=$key;?>" <?=$checked;?>><?=__($email, 'lr');?>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  <?php } ?>
                  <div class="col-12 text-center">
                    <input type="hidden" name="configuration_type" value="lr_emails">
                    <input type="submit" class="btn btn-info" value="<?=__('Guardar');?>">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane" id="cnf_notificaciones">
            <form name="configuration" method="post">
              <div class="card">
                <div class="row">
                  <div class="col-12 title">
                    <h4><?=__('Selecciona las notificaciones que quieres recibir', 'lr');?></h4><br/>
                  </div>
                  <?php foreach (LR_Notifications::$notifications_configuration as $key => $notification) {
                    $checked='checked';
                    if (get_user_meta(get_current_user_id(), "lr_notifications_".$key, true)==0)  {
                      $checked='';
                    }
                    ?>
                    <div class="col-6 form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="1" name="lr_notifications_<?=$key;?>" <?=$checked;?>><?=__($notification, 'lr');?>
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  <?php } ?>
                  <div class="col-12 text-center">
                    <input type="hidden" name="configuration_type" value="lr_notifications">
                    <input type="submit" class="btn btn-info" value="<?=__('Guardar');?>">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- #primary -->

<?php

get_footer('my-account');
