

<p>Un nuevo usuario ha creado una lista</p>

<table class="table_data">
  <tr>
    <td>Nombre</td>
    <td><?=get_user_meta($variables['user_id'], 'first_name', true).' '.get_user_meta($variables['user_id'], 'last_name', true);?></td>
  </tr>
  <tr>
    <td>User id</td>
    <td><?=$variables['user_id'];?></td>
  </tr>
</table>
