<?php

//Standard text field
function ctct_form_text($name, $value, $args = null){
	if(isset($args['width'])) $field_width = ' style="width:'.$args['width'].';"'; else $field_width = '';
	if(isset($args['placeholder'])) $field_placeholder = ' placeholder="'.$args['placeholder'].'"'; else $field_placeholder = '';
	$output = '<input type="text" value="'.htmlentities(stripslashes($value), ENT_QUOTES, 'UTF-8').'" name="'.$name.'" id="'.$name.'"'.$field_width.$field_placeholder.'/>';
	return $output;
}

//Textarea field
function ctct_form_textarea($name, $value, $args = null){	
	if(isset($args['placeholder'])) $field_placeholder = ' placeholder="'.$args['placeholder'].'"'; else $field_placeholder = '';		
	$output = '<textarea name="'.$name.'" id="'.$name.'"'.$field_placeholder.'>'.(stripslashes($value)).'</textarea>';
	return $output;
}


//Yes/No radio selection field
function ctct_form_yesno($name, $value, $args = null){
	$checked_yes = '';
	$checked_no = ' checked';
	if($value == '1'){
		$checked_yes = ' checked';
		$checked_no = '';
	}
	$output = '';
	$output .= '<label for="'.$name.'_yes">';
	$output .= '<input type="radio" name="'.$name.'" id="'.$name.'_yes" value="1" '.$checked_yes.'/>'; 
	$output .= __('Yes', 'ctct').'</label>';
	$output .= '&nbsp;&nbsp;&nbsp;&nbsp;';
	
	$output .= '<label for="'.$name.'_no">';
	$output .= '<input type="radio" name="'.$name.'" id="'.$name.'_no" value="0" '.$checked_no.'/>'; 
	$output .= __('No', 'ctct').'</label>';
	return $output;
}


//Dropdown list field
function ctct_form_select($name, $value, $list, $args = null){
	if(isset($args['width'])) $field_width = ' style="width:'.$args['width'].';"'; else $field_width = '';
	$field_class = (isset($args['class']) ? $args['class'] : '');
	$output = '<select class="cpometabox_field_select '.$field_class.'" name="'.$name.'" id="'.$name.'"'.$field_width.'>';
	if(sizeof($list) > 0)
		foreach($list as $list_key => $list_value){
			if(is_array($list_value)){
				$disabled = '';
				if(isset($list_value['type']) && $list_value['type'] == 'separator')
					$disabled = ' disabled';
				$output .= '<option value="'.htmlentities(stripslashes($list_key)).'"'.$disabled;
				$output .= '>'.str_replace('&amp;', '&', htmlentities(stripslashes($list_value['name']), ENT_QUOTES, "UTF-8")).'</option>';
			}else{
				$output .= '<option value="'.htmlentities(stripslashes($list_key)).'" ';
				$output .= selected($value, $list_key, false);
				$output .= '>'.str_replace('&amp;', '&', htmlentities(stripslashes($list_value), ENT_QUOTES, "UTF-8")).'</option>';
			}
		}
	$output .= '</select>';
	return $output;
}	