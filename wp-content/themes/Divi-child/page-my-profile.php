<?php
/**
* Template Name: Mi perfil
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

global $page_key;
$page_key='profile';
$user = get_userdata( get_current_user_id() );

get_header('my-account'); ?>

<?php LR_Layout::display_user_menu_top(); ?>
<div class="content">
  <div class="container-fluid page-my-profile">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header card-header-icon card-header-azure">
            <div class="card-icon">
              <i class="fas fa-user"></i>
            </div>
            <h4 class="card-title"><?=__('Edita tu perfil', 'lr');?> -
              <small class="category"><?=__('Completa tu perfil', 'lr');?></small>
            </h4>
          </div>
          <div class="card-body">
            <form name="profile" method="post">
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('Nombre de usuario', 'lr');?></label>
                    <input type="text" required class="form-control" disabled="" name="username" value="<?=$user->user_login;?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('Nombre', 'lr');?></label>
                    <input type="text" required class="form-control" name="first_name" value="<?=get_user_meta(get_current_user_id(), 'first_name', true)?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('Apellidos', 'lr');?></label>
                    <input type="text" required class="form-control" name="last_name" value="<?=get_user_meta(get_current_user_id(), 'last_name', true)?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('Email', 'lr');?></label>
                    <input type="text" required class="form-control" disabled="" name="email" value="<?=$user->user_email;?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('Fecha de nacimiento', 'lr');?></label>
                    <input type="text" class="form-control datepicker" name="birthday" value="<?=get_user_meta(get_current_user_id(), 'birthday', true)?>">
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('Teléfono', 'lr');?></label>
                    <input type="text" class="form-control" name="phone" value="<?=get_user_meta(get_current_user_id(), 'phone', true)?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('Dirección', 'lr');?></label>
                    <input type="text" class="form-control" name="address" value="<?=get_user_meta(get_current_user_id(), 'address', true)?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('Ciudad', 'lr');?></label>
                    <input type="text" class="form-control" name="city" value="<?=get_user_meta(get_current_user_id(), 'city', true)?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('País', 'lr');?></label>
                    <input type="text" class="form-control" name="country" value="<?=get_user_meta(get_current_user_id(), 'country', true)?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating"><?=__('Código postal', 'lr');?></label>
                    <input type="text" class="form-control" name="postal_code" value="<?=get_user_meta(get_current_user_id(), 'postal_code', true)?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <select name="how_you_meet_us" class="form-control selectpicker" title="<?=__('¿Cómo nos has conocido?', 'lr');?>" data-style="select-with-transition">
                      <?php $meet=array('friend' => 'Amigos', 'google' => 'Google', 'facebook' => 'Facebook', 'instagram' => 'Instagram', 'otros' => 'Otros');
                      $option=get_user_meta(get_current_user_id(), 'how_you_meet_us', true);
                      foreach ($meet as $key => $met) {
                        $checked='';
                        if ($key==$option) {
                          $checked='selected';
                        }
                        echo '<option value="'.$key.'" '.$checked.'>'.$met.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
              <br/>
              <br/>
              <br/>
              <div class="row">
                <div class="col-md-12 text-right">
                  <input type="hidden" name="profile_settings">
                  <button type="submit" class="btn btn-info"><?=__('Guardar cambios', 'lr');?></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="img-avatar-profile">
          <img src="<?=LR_User::get_user_photo();?>" alt="<?=get_user_meta(get_current_user_id(), 'first_name', true).' '.get_user_meta(get_current_user_id(), 'last_name', true);?>"><br/>
          <span class="btn btn-info btn-file">
            <span class="fileinput-new"><?=__('Selecciona una imagen', 'lr');?></span>
            <input type="file" name="upload_image" id="upload_image" accept="image/*" />
          </Span>
        </div>
      </div>
    </div><br/>
  </div>
</div><!-- #primary -->

<?php
include('templates/modals/image_profile.php');
get_footer('my-account');
