<?php
  $user = get_userdata( $variables['user_id'] );
?>

<p>Un nuevo usuario se ha registrado</p>

<table class="table_data">
  <tr>
    <td>Usuario</td>
    <td><?=$user->user_login;?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?=$user->user_email;?></td>
  </tr>
</table>
