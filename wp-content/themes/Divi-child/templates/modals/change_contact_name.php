<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="change_contact_name_modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br/>
        <h4 class="modal-title" id="myModalLabel"><?=__('Elige un contacto', 'lr');?></h4>
      </div>
      <div class="modal-body text-center">
        <form method="post">
          <select required name="person_id" class="form-control person_id selectpicker" title="<?=__('¿Para quién es?', 'lr');?>" data-style="select-with-transition">
            <option value="<?=get_current_user_id();?>"><?=__('Para mí', 'lr');?></option>
            <?php $contacts=LR_Contacts::get_my_contacts(get_current_user_id(), 'accepted');
            foreach ($contacts as $contact) {
              echo '<option value="'.$contact['user_id'].'">'.get_user_meta($contact['user_id'], 'first_name', true).' '.get_user_meta($contact['user_id'], 'last_name', true).'</option>';
            } ?>
          </select><br/>
          <input type="hidden" value="" name="person_name" class="person_name">
          <button class="btn btn-info" id="modal-btn-si" data-show=true data-gift=""><?=__('Cambiar', 'lr');?></button>
        </form>
      </div>
    </div>
  </div>
</div>
