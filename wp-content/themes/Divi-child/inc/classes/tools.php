<?php
// FILE TO ADD TOOL FUNCTIONS


class LR_Tools {

	public static function load_template( $template ) {
		if(file_exists(LR_TEMPLATES_DIR.$template . '.php')){
			include LR_TEMPLATES_DIR.$template . '.php';
			return true;
		}
		return false;
	}

	public static function get_config( $config ) {
		if(file_exists(LR_CONFIG_DIR.$config. '.php')){
			include LR_CONFIG_DIR.$config. '.php';
			return $config;
		}
		return false;
	}

	public static function create_form($input, $array=false, $x=1) {
		if ($input['type']=='text') { LR_Tools::create_input_text($input, $array, $x); }
		else if ($input['type']=='date') { LR_Tools::create_input_date($input, $array, $x); }
		else if ($input['type']=='select') { LR_Tools::create_input_select($input, $array, $x); }
		else if ($input['type']=='textarea') { LR_Tools::create_input_textarea($input, $array, $x); }
		else if ($input['type']=='file') { LR_Tools::create_input_file($input, $array, $x); }
		else if ($input['type']=='radio') { LR_Tools::create_input_radio($input, $array, $x); }
		else if ($input['type']=='checkbox') { LR_Tools::create_input_checkbox($input, $array, $x); }
	}

	public static function create_input_text($input, $array, $x) { ?>
		<?php $name='';
		if ($array) {
			$name='['.$x.']';
		}
		if ($input['name']=='gift_link' && is_array($input['value']) ) {
			foreach ($input['value'] as $value) { ?>
				<input type="text" placeholder="<?=$input['text'];?>" value="<?=$value;?>" class="form-control <?=$input['name'];?>" name="<?=$input['name'].$name.'[]';?>" <?php if ($input['required']) { echo 'required'; } ?>>
			<?php }
		} else { ?>
			<input type="text" placeholder="<?=$input['text'];?>" value="<?=$input['value'];?>" class="form-control <?=$input['name'];?>" name="<?=$input['name'].$name;?>" <?php if ($input['required']) { echo 'required'; } ?>>
		<?php } ?>
	<?php }

	public static function create_input_file($input, $array, $x) { ?>
		<!--<label class="bmd-label-floating"><?=$input['text'];?></label>-->
		<?php $name='';
		if ($array) {
			$name='['.$x.']';
		} ?>
		<input type="file" multiple="multiple" class="form-control" name="<?=$input['name'].$name;?>" <?php if ($input['required']) { echo 'required'; } ?>>
	<?php }

	public static function create_input_textarea($input, $array, $x) { ?>
		<?php $name='';
		if ($array) {
			$name='['.$x.']';
		} ?>
		<textarea placeholder="<?=$input['text'];?>" class="form-control" id="<?=$input['name'];?>" name="<?=$input['name'].$name;?>" <?php if ($input['required']) { echo 'required'; } ?> style="height: 36px"><?=$input['value'];?></textarea>
		<?php }

		public static function create_input_date($input, $array, $x) { ?>
			<?php $name='';
			if ($array) {
				$name='['.$x.']';
			} ?>
			<input type="text" placeholder="<?=$input['text'];?>" class="form-control datepicker" value="<?=$input['value'];?>" name="<?=$input['name'].$name;?>" <?php if ($input['required']) { echo 'required'; } ?>>
		<?php }

		public static function create_input_select($input, $array, $x) { ?>
			<?php
			$value=$input['value'];
			$name='';
			if ($array) {
				$name='['.$x.']';
			}
			if ($input['multiple']=='multiple') {
				$name='[]';
			} ?>
			<select class="form-control selectpicker" title="<?=$input['text'];?>" name="<?=$input['name'].$name;?>" <?=$input['multiple'];?> data-style="select-with-transition" <?php if ($input['required']) { echo 'required'; } ?> >
				<?php foreach ($input['options'] as $key => $option) {
					$selected='';
					if ($value==$key) {
						$selected='selected';
					}?>
					<option value="<?=$key;?>" <?=$selected;?>><?=$option;?></option>
				<?php } ?>
			</select>
			<?php if ($input['multiple']) {
				echo '<input type="hidden" name="'.$input['name'].'_select'.$name.'">';
			} ?>
		<?php }

		public static function create_input_radio($input, $array, $x) { ?>
			<?php
			$value=$input['value'];
			$name='';
			if ($array) {
				$name='['.$x.']';
			} ?>
			<div class="lr-radio-wrapper form-control">
				<label for="<?=$input['name'];?>" class="bmd-label-floating"><?=$input['text'];?></label><br/><br/>
				<?php foreach ($input['options'] as $key => $option) {
					$checked='';
					if ($value==$key) {
						$checked='checked';
					}?>
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" value="<?=$key;?>" name="<?=$input['name'].$name;?>" <?=$checked;?>><?=$option;?>
							<span class="form-check-sign">
								<span class="check"></span>
							</span>
						</label>
					</div>
				<?php }  ?>
			</div>
		<?php }


		public static function create_input_checkbox($input, $array, $x) { ?>
			<?php
			$value=$input['value'];
			$name='';
			if ($array) {
				$name='['.$x.']';
			} ?>
			<div class="lr-radio-wrapper form-control">
				<label for="<?=$input['name'];?>" class="bmd-label-floating"><?=$input['text'];?></label><br/><br/>
				<?php
				if (!is_array($input['options']) || count($input['options'])==0) {
					echo '<label class="form-check-label">'.__('Aún no tienes contactos aceptados', 'lr').'</label>';
				} else {
					foreach ($input['options'] as $key => $option) {
						$checked='';
						if ($value==$key) {
							$checked='checked';
						}?>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" value="<?=$key;?>" name="<?=$input['name'].$name;?>" <?=$checked;?>><?=$option;?>
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>
					<?php }  } ?>
			</div>
		<?php }


	}

	new LR_Tools();

	?>
