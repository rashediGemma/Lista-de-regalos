<div class="modal fade" id="modalNewGift" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title font-weight-bold"><?=__('Nuevo regalo', 'lr');?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="new_gift" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"><?=__('Título', 'lr');?></label>
                <input type="text" required class="form-control" name="name">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group bmd-form-group">
                <select required name="person_id" class="form-control person_id selectpicker" title="<?=__('¿Para quién es?', 'lr');?>" data-style="select-with-transition">
                  <option value="<?=get_current_user_id();?>"><?=__('Para mí', 'lr');?></option>
                  <?php $contacts=LR_Contacts::get_my_contacts(get_current_user_id(), 'accepted');
                  foreach ($contacts as $contact) {
                    echo '<option value="'.$contact['user_id'].'">'.get_user_meta($contact['user_id'], 'first_name', true).' '.get_user_meta($contact['user_id'], 'last_name', true).'</option>';
                  } ?>
                  <option value="0" class="other_user"><?=__('No está entre mis contactos', 'lr');?></option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group bmd-form-group other_contact">
                <label class="bmd-label-floating"><?=__('Nombre', 'lr');?></label>
                <input type="text" class="form-control" name="person_name">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"><?=__('Precio en €', 'lr');?></label>
                <input type="text" class="form-control" name="price">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group bmd-form-group">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="1" name="buyed"><?=__('Comprado', 'lr');?>
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <input type="hidden" name="new_gift_shopping" value="1">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=__('Cancelar', 'lr');?></button>
          <input type="submit" class="btn btn-info" value="<?=__('Añadir', 'lr');?>">
        </div>
      </form>
    </div>
  </div>
</div>
