<?php
/**
* Template Name: Mis compras
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

global $page_key;
$page_key='gifts';
$shoppings=LR_Shoppings::get_shoppings();

get_header('my-account'); ?>

<?php LR_Layout::display_user_menu_top(); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 add_new_shopping">
        <br/><a href="" class="btn btn-info" data-toggle="modal" data-target="#modalNewGift"><?=__('Añadir un nuevo regalo', 'lr');?></a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php if (count($shoppings)==0) {
          echo '<br/><br/><h5>'.__('Aún no tienes ningún regalo. Empieza a crear uno.', 'lr').'</h5>';
        }  else { ?>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-2">
              <?php $shoppings=LR_Shoppings::get_shoppings_group_by('year', 'DESC'); ?>
              <select name="year_shopping" class="form-control year_shopping selectpicker" data-style="select-with-transition">
                <?php
                $x=0;
                foreach ($shoppings as $shopping) {
                  $checked='';
                  if ($x==0) {
                    $checked='checked';
                  }
                  echo '<option value="'.$shopping->year.'" '.$checked.'>'.$shopping->year.'</option>';
                  $x++;
                } ?>
              </select>
            </div>
            <div class="col-12 col-sm-6 col-md-7">
              <span class="total_year"><?=__('Total gastado este año:', 'lr');?><span></span></span>
            </div>
          </div>
          <div class="row">
            <div class="col-12 shoppings_wrapper">
            </div>
          </div>
        <?php } ?>
      </div>
      <?php include('templates/modals/new_gift.php'); ?>
      <?php include('templates/modals/change_contact_name.php'); ?>
    </div>
  </div>
</div>

<?php

get_footer('my-account');
