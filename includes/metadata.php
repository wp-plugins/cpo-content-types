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
		
		/*$data['ctct_services'] = array(
		'label' => __('Services', 'ctct'),
		'description' => __('Set up custom slugs for the service content type.', 'ctct'));*/
		
		return apply_filters('ctct_metadata_sections', $data);
	}
}


//Settings
if(!function_exists('ctct_metadata_settings')){
	function ctct_metadata_settings($std = null){
		$data = array();
		
		/*$data['type_slides'] = array(
		'label' => __('Slides', 'ctct'),
		'description' => __('Used as part of the main homepage slider.', 'ctct'),
		'section' => 'ctct_content_types',
		'type' => 'checkbox');
		
		$data['type_features'] = array(
		'label' => __('Features', 'ctct'),
		'description' => __('Features are blocks of highlighted content shown in the homepage.', 'ctct'),
		'section' => 'ctct_content_types',
		'type' => 'checkbox');
		
		$data['type_portfolio'] = array(
		'label' => __('Portfolio', 'ctct'),
		'description' => __('You can use portfolio items to display your projects and work.', 'ctct'),
		'section' => 'ctct_content_types',
		'type' => 'checkbox');
		
		$data['type_services'] = array(
		'label' => __('Services', 'ctct'),
		'description' => __('Services help you showcase your offerings to potential clients.', 'ctct'),
		'section' => 'ctct_content_types',
		'type' => 'checkbox');
		
		$data['type_team'] = array(
		'label' => __('Team Members', 'ctct'),
		'description' => __('Used on team pages to display people working on your team.', 'ctct'),
		'section' => 'ctct_content_types',
		'type' => 'checkbox');
		
		$data['type_testimonials'] = array(
		'label' => __('Testimonials', 'ctct'),
		'description' => __('Gain social proof by listing quotes from relevant people.', 'ctct'),
		'section' => 'ctct_content_types',
		'type' => 'checkbox');
		
		$data['type_clients'] = array(
		'label' => __('Clients', 'ctct'),
		'description' => __('List all the people you have worked with or support you.', 'ctct'),
		'section' => 'ctct_content_types',
		'type' => 'checkbox');*/
		
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
		
		/*$data['slug_service'] = array(
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
		'placeholder' => 'service-tag');*/
		
		return apply_filters('ctct_metadata_settings', $data);
	}
}