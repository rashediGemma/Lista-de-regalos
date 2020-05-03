<?php
  echo get_user_meta($variables['other_user'], 'first_name', true).' '.get_user_meta($variables['other_user'], 'last_name', true).' '.__('te ha aceptado la solicitud de amistad.', 'lr');?><br/><br/>
<?php echo __('¡Ahora estáis conectados!', 'lr');?>
