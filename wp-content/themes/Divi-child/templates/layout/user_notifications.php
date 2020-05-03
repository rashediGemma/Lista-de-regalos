<?php $notifications=LR_Notifications::get_notifications(); ?>
<div class="lr-user-notifications-wrapper">
	<?php
  if (!is_array($notifications) || count($notifications)==0) { ?>
    <p><?=__('No tienes notificaciones nuevas para leer', 'lr');?></p>
  <?php } else {
    foreach ($notifications as $notification)  { ?>
      <a class="lr-user-notification-link" href="<?=$notification->url;?>" data-notification='<?=$notification->id_primary;?>'>
        <div class="lr-user-notification-item"><?=$notification->text;?></div>
      </a>
    <?php } } ?>
</div>
