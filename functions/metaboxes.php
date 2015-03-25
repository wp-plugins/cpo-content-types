<?php

//Add default metaboxes to posts
add_action('add_meta_boxes', 'ctct_metaboxes');
function ctct_metaboxes(){
	$args = array('public' => true);
	
	add_meta_box('ctct_feature', __('Feature Options', 'ctct'), 'ctct_metabox_feature', 'cpo_feature', 'normal', 'high');
	add_meta_box('ctct_portfolio', __('Portfolio Options', 'ctct'), 'ctct_metabox_portfolio', 'cpo_portfolio', 'normal', 'high');
}

//Display and save post metaboxes
function ctct_metabox_feature($post){
	ctct_meta_fields($post, ctct_metadata_feature_options());
}
function ctct_metabox_portfolio($post){
	ctct_meta_fields($post, ctct_metadata_portfolio_options());
}
add_action('edit_post', 'ctct_metaboxes_save');
function ctct_metaboxes_save($post){
	ctct_meta_save(ctct_metadata_feature_options());
	ctct_meta_save(ctct_metadata_portfolio_options());
}


// Prints meta field HTML
if(!function_exists('ctct_meta_fields')){
	function ctct_meta_fields($post, $cpo_metadata = null){
		if($cpo_metadata == null || sizeof($cpo_metadata) == 0) return;
		$output = '';
		
		wp_nonce_field('ctct_savemeta', 'ctct_nonce');
		
		foreach($cpo_metadata as $current_meta){
			$field_name = $current_meta["name"];
			$field_title = $current_meta['label'];
			$field_desc = $current_meta['desc'];
			$field_type = $current_meta['type'];
			$field_value = '';
			$field_value = get_post_meta($post->ID, $field_name, true);
			
			//Additional CSS classes depending on field type
			$field_classes = '';
			if($field_type == 'collection') $field_classes = ' ctct-metabox-wide';
			
			$output .= '<div class="ctct-metabox '.$field_classes.'"><div class="name">'.$field_title.'</div>';
			$output .= '<div class="field">';
			
			// Print metaboxes here. Develop different cases for each type of field.
			if($field_type == 'text')
				$output .= ctct_form_text($field_name, $field_value, $current_meta);
			
			elseif($field_type == 'textarea')
				$output .= ctct_form_textarea($field_name, $field_value, $current_meta);
			
			elseif($field_type == 'select')
				$output .= ctct_form_select($field_name, $field_value, $current_meta['option'], $current_meta);
			
			elseif($field_type == 'yesno')
				$output .= ctct_form_yesno($field_name, $field_value, $current_meta);
			
			$output .= '</div>';
			$output .= '<div class="desc">'.$field_desc.'</div></div>';
		}
		echo $output;
	}
}
	
// Saves meta field data into database
if(!function_exists('ctct_meta_save')){
	function ctct_meta_save($option){

		if(!isset($_POST['post_ID'])) return;
		if(!wp_verify_nonce($_POST['ctct_nonce'], 'ctct_savemeta')) return;
		
		$cpo_metaboxes = $option;
		$post_id = $_POST['post_ID'];
			
		//Check if we're editing a post
		if(isset($_POST['action']) && $_POST['action'] == 'editpost'){                                   
			
			//Check every option, and process the ones there's an update for.
			if(sizeof($cpo_metaboxes) > 0)
			foreach ($cpo_metaboxes as $current_meta){
			   
				$field_name = $current_meta['name'];
				
				//If the field has an update, process it.
				if(isset($_POST[$field_name])){
					$field_value = $_POST[$field_name];
					
					// Delete unused metadata
					if(empty($field_value) || $field_value == ''){ 
						delete_post_meta($post_id, $field_name, get_post_meta($post_id, $field_name, true));
					}
					// Update metadata
					else{ 
						update_post_meta($post_id, $field_name, $field_value);
					}
				}
			}
		}
	}
}
