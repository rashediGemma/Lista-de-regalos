<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end icons-top-wrapper">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?=get_permalink(get_page_by_path('ayuda'));?>" class="lr-help-icons__link">
						<i class="large material-icons far fa-question-circle"></i>
					</a>
				</li>
				<li class="nav-item">
					<a href="" class="lr-help-icons__link">
						<i class="large material-icons far fa-bell"></i>
						<?php if (count(LR_Notifications::get_notifications())>0) { ?>
							<span class="notifications-number"><span><?=count(LR_Notifications::get_notifications());?></span></span>
						<?php } ?>
					</a>
					<?php LR_Tools::load_template('layout/user_notifications'); ?>
				</li>
			</ul>
		</div>
	</div>
</nav>
