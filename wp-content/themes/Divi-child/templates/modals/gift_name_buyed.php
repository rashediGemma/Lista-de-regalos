<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="gift_name_buyed_modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br/>
        <h4 class="modal-title" id="myModalLabel"><?=__('¿Quieres mostrar tu nombre a los demás?', 'lr');?></h4>
      </div>
      <div class="modal-body text-center">
        <button type="button" class="btn btn-info" id="modal-btn-si" data-show=true data-gift=""><?=__('Si', 'lr');?></button>
        <button type="button" class="btn btn-default" id="modal-btn-no" data-show=false data-gift=""><?=__('No', 'lr');?></button>
      </div>
    </div>
  </div>
</div>
