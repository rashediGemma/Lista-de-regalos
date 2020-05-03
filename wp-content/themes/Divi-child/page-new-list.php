<?php
/**
* Template Name: Nueva lista
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

global $page_key;
$page_key='my_lists';
$config_about=LR_Tools::get_config('my_list_about_form' );
$config_gifts=LR_Tools::get_config('my_list_gifts_form' );
$gifts_list=array();
$list_buyed_class="";
if (isset($_GET['id'])) {
  $list_id=LR_Lists::get_id_from_unique($_GET['id']);
  $gifts_list=LR_Gifts::get_gifts_list($list_id);
  $list_buyed_class=get_post_meta($list_id, 'gifts_buyed', true);
}

if (!is_array($gifts_list) || count($gifts_list)==0) {
  $gifts_list=array('0' => '1');
}

get_header('my-account'); ?>

<div class="content">
  <div class="container-fluid">
    <div class="col-md-10 col-12 mr-auto ml-auto">
      <div class="wizard-container">
        <div class="card card-wizard active" data-color="blue" id="wizardProfile">
          <form action="" method="post">
            <input name="save_list" type="hidden" value="<?=$list_id;?>">
            <div class="card-header text-center">
              <?php if (isset($_GET['id'])) { ?>
                <h3 class="card-title"><?=__('Edita la lista');?></h3>
              <?php } else { ?>
                <h3 class="card-title"><?=__('Crea una nueva lista');?></h3>
                <h5 class="card-description"><?=__('Crea una lista de deseos para tu próximo evento');?></h5>
              <?php } ?>
            </div>
            <div class="wizard-navigation">
              <ul class="nav nav-pills">
                <li class="nav-item" style="width: 50%;">
                  <a class="nav-link active btn-previous" href="" data-target="#about" data-toggle="tab" role="tab"><?=__('Configuración', 'lr');?></a>
                </li>
                <li class="nav-item" style="width: 50%;">
                  <a class="nav-link" href="" data-target="#gifts" data-toggle="tab" role="tab"><?=__('Regalos', 'lr');?></a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="about">
                  <div class="row justify-content-center">
                    <div class="col-10">
                      <?php
                      foreach ($config_about as $about) {
                        $class='';
                        if ($about['name']=='contacts' && $about['value']=='') {
                          $class='hide';
                        }
                        if (isset($about['show_form'])) { continue; } ?>
                        <div class="input-group form-control-lg <?=$about['name'];?> <?=$class;?>">
                          <div class="form-group bmd-form-group">
                            <?php LR_Tools::create_form($about); ?>
                            <i class="fas fa-question" data-toggle="tooltip" title="<?=$about['tooltip'];?>"></i>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="tab-pane list_see_buyed_<?=$list_buyed_class;?>" id="gifts">
                  <?php
                  $number_gifts=1;
                  $array_gifts=array();
                  $new_gift_class='';
                  if (is_array($gifts_list) && count($gifts_list)>0) {
                    $number_gifts=count($gifts_list);
                    $new_gift_class='gift_existing';
                  } ?>
                  <input type="hidden" name="gifts_number" value="<?=$number_gifts;?>">
                  <div class="row justify-content-center lr_gifts_accordion_wrap">
                    <?php
                    if (is_array($gifts_list) && count($gifts_list)>0) {
                      $x=1;
                      foreach ($gifts_list as $gift) { $array_gifts[]=$gift; ?>
                        <div class="col-sm-11 lr_gifts_accordion <?=$new_gift_class;?> gift_buyed_<?=get_post_meta($gift, 'gift_buyed', true);?>" data-gift="<?=$gift;?>">
                          <i class="gift-delete fas fa-times"></i>
                          <div class="row">
                            <?php
                            foreach ($config_gifts as $about) {
                              $about['value']='';
                              if ($gift!=1) {
                                $about['value']=LR_Gifts::get_value($about['name'], $gift);
                              }
                              ?>
                              <div class="<?=$about['width'];?> col-12 <?=$about['name'];?>">
                                <div class="form-group bmd-form-group">
                                  <?php if ($about['name']=='gift_link') { ?>
                                    <div class="gift_link_wrapper">
                                  <?php } ?>
                                  <?php LR_Tools::create_form($about, true, $x); ?>
                                  <?php if ($about['name']=='gift_link') { ?>
                                    <i class="fas fa-plus add-link-gift"></i>
                                    </div>
                                  <?php } ?>
                                </div>
                              </div>
                            <?php } ?>
                          </div>
                        </div>
                        <input type="hidden" name="gift_id[<?=$x;?>]" value="<?=$gift;?>">
                      <?php $x++; }
                    } ?>
                  </div>
                  <input type="hidden" name="array_gifts" value="<?=implode(",", $array_gifts);?>">
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <input type="button" class="btn btn-info" id="lr_add_gift" value="<?=__('Añadir regalo', 'lr');?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="mr-auto">
                <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="<?=__('Atrás', 'lr');?>">
              </div>
              <div class="ml-auto">
                <input type="button" class="btn btn-next btn-fill btn-info btn-wd" name="next" value="<?=__('Siguiente', 'lr');?>">
                <?php
                if (isset($_GET['id'])) {
                  $value=__('Guardar lista', 'lr');
                } else {
                  $value=__('Añadir lista', 'lr');
                } ?>
                <input type="submit" class="btn btn-finish btn-fill btn-info btn-wd" name="finish" value="<?=$value;?>">
              </div>
              <div class="clearfix"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
get_footer('my-account');
