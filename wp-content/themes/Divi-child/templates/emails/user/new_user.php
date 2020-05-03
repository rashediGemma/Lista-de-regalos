<?php
  $user = get_userdata( $variables['user_id'] );
  $key = get_password_reset_key( $user );
  if ( is_wp_error( $key ) ) {
    return;
  }

  $message = __('Muchas gracias por registrarte a ', 'lr').' Lista de Regalos.<br/><br/>';
  $message  .= sprintf( __( 'Username: %s' ), $user->user_login ) . "<br/><br/>";
  $link = network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user->user_login ), 'login' ).">";
  $message.='<a href="'.$link.'">'.__('Haz clic aquí para establecer tu contraseña', 'lr').'</a><br/><br/>';

  $message .= '<a href="'.wp_login_url().'">Accede aquí para iniciar sesión</a><br/>';

  echo $message;
