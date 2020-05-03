
		<div id="wrapper">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container">
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header">
										<tr>
											<td id="header_wrapper__logo">
												<a href="<?=wp_login_url();?>" class="rcbr-main-header__logo">
													<img src="<?=esc_attr( LR_Layout::get_logo_white()); ?>">
												</a>
											</td>
											<td id="header_wrapper__login">
												<a class="rcbr-main-header__logo rcbr-link-email__white" href="<?=wp_login_url();?>"><?=__('Inicia sesión en ', 'lr');?> Lista de Regalos</a>
											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
										<tr>
											<td valign="top" id="body_content">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
													<tr>
														<td valign="top">
															<div id="body_content_inner">
																<p><?=__('Estimado/a', 'lr').' '.get_user_meta($variables['user_id'], 'first_name', true).' '.get_user_meta($variables['user_id'], 'last_name', true);?>,</p><br/>
