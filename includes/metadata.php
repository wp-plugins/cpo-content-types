<?php 

//Define customizer sections
if(!function_exists('ctct_metadata_sections')){
	function ctct_metadata_sections(){
		$data = array();
		
		/*$data['ctct_content_types'] = array(
		'label' => __('Content Types', 'ctct'),
		'description' => __('Enable or disable specific content types in the admin area.', 'ctct'));*/
		
		$data['ctct_portfolio'] = array(
		'label' => __('Portfolio', 'ctct'),
		'description' => __('Set up custom slugs for the portfolio content type.', 'ctct'));
		
		$data['ctct_services'] = array(
		'label' => __('Services', 'ctct'),
		'description' => __('Set up custom slugs for the service content type.', 'ctct'));
		
		$data['ctct_team'] = array(
		'label' => __('Team Members', 'ctct'),
		'description' => __('Set up custom slugs for the team members content type.', 'ctct'));
		
		return apply_filters('ctct_metadata_sections', $data);
	}
}


//Settings
if(!function_exists('ctct_metadata_settings')){
	function ctct_metadata_settings($std = null){
		$data = array();
		
		$data['slug_portfolio'] = array(
		'label' => __('Portfolio Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for individual portfolio items.', 'ctct'),
		'section' => 'ctct_portfolio',
		'type' => 'text',
		'width' => '250px',
		'placeholder' => 'portfolio-item');
		
		$data['slug_portfolio_category'] = array(
		'label' => __('Portfolio Category Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for portfolio categories.', 'ctct'),
		'section' => 'ctct_portfolio',
		'type' => 'text',
		'class' => 'half-text',
		'placeholder' => 'portfolio-category');
		
		$data['slug_portfolio_tag'] = array(
		'label' => __('Portfolio Tag Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for portfolio tags.', 'ctct'),
		'section' => 'ctct_portfolio',
		'type' => 'text',
		'placeholder' => 'portfolio-tag');
		
		/*$data['slug_product'] = array(
		'label' => __('Product Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for individual products.', 'ctct'),
		'section' => 'ctct_products',
		'type' => 'text',
		'width' => '250px',
		'placeholder' => 'product');
		
		$data['slug_product_category'] = array(
		'label' => __('Product Category Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for product categories.', 'ctct'),
		'section' => 'ctct_products',
		'type' => 'text',
		'placeholder' => 'product-category');
		
		$data['slug_product_tag'] = array(
		'label' => __('Product Tag Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for product tags.', 'ctct'),
		'section' => 'ctct_products',
		'type' => 'text',
		'placeholder' => 'product-tag');*/
		
		$data['slug_service'] = array(
		'label' => __('Service Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for individual services.', 'ctct'),
		'section' => 'ctct_services',
		'type' => 'text',
		'width' => '250px',
		'placeholder' => 'service');
		
		$data['slug_service_category'] = array(
		'label' => __('Service Category Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for service categories.', 'ctct'),
		'section' => 'ctct_services',
		'type' => 'text',
		'placeholder' => 'service-category');
		
		$data['slug_service_tag'] = array(
		'label' => __('Service Tag Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for service tags.', 'ctct'),
		'section' => 'ctct_services',
		'type' => 'text',
		'placeholder' => 'service-tag');
		
		$data['slug_team_category'] = array(
		'label' => __('Team Group Slug', 'ctct'),
		'description' => __('Indicates the slug to be used in the URL for team groups.', 'ctct'),
		'section' => 'ctct_team',
		'type' => 'text',
		'placeholder' => 'team-group');
		
		return apply_filters('ctct_metadata_settings', $data);
	}
}