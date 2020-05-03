<?php
  echo get_user_meta(get_current_user_id(), 'first_name', true).' '.get_user_meta(get_current_user_id(), 'last_name', true).' '.__('te ha enviado una solicitud de amistad.', 'lr');?><br/><br/>

  <?=__('Inicia sesión en tu cuenta para aceptar su amistad y así poder empezar a compartir vuestras listas de regalos.', 'lr');?>
