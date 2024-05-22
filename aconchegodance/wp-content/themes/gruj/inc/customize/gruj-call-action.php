<?php
function gruj_call_action_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Call Action Section Panel
	=========================================*/
	
	// Review Head
	$wp_customize->add_setting(
		'cta_review_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'cta_review_head',
		array(
			'type' => 'hidden',
			'label' => __('Review','gruj'),
			'section' => 'call_action_content',
			'priority'  => 5
		)
	);
	
	// Review Title // 
	$wp_customize->add_setting(
    	'call_action_review_ttl',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'call_action_review_ttl',
		array(
		    'label'   => __('Title','gruj'),
		    'section' => 'call_action_content',
			'type'           => 'text',
			'priority'  => 5
		)  
	);
	
	// Review Content // 
	$wp_customize->add_setting(
    	'call_action_review_content',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'call_action_review_content',
		array(
		    'label'   => __('Content','gruj'),
		    'section' => 'call_action_content',
			'type'           => 'textarea',
			'priority'  => 5
		)  
	);
	
	// Call Title // 
	$wp_customize->add_setting(
    	'call_action_button_title',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'call_action_button_title',
		array(
		    'label'   => __('Email','gruj'),
		    'section' => 'call_action_content',
			'type'           => 'text',
			'priority'  => 11
		)  
	);

	// Call button 4 // 
	$wp_customize->add_setting(
    	'call_action_button_label4',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'call_action_button_label4',
		array(
		    'label'   => __('Button Label 4','gruj'),
		    'section' => 'call_action_content',
			'type'           => 'text',
			'priority'  => 11
		)  
	);
	
	// Call button 4 link // 
	$wp_customize->add_setting(
    	'call_action_button_link4',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'call_action_button_link4',
		array(
		    'label'   => __('Button Link 4','gruj'),
		    'section' => 'call_action_content',
			'type'           => 'text',
			'priority'  => 11
		)  
	);
	
	// Button2 Icon // 
	$wp_customize->add_setting(
    	'call_action_button2_icon',
    	array(
	        'default'			=> 'fa-bell',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_html',
		)
	);	
	
	$wp_customize->add_control( 
		'call_action_button2_icon',
		array(
		    'label'   => __('Icon','gruj'),
		    'section' => 'call_action_content',
			'type'           => 'text',
			'priority'  => 9
		)  
	);
	
	// Img Icon // 
	$wp_customize->add_setting(
    	'call_action_img_icon',
    	array(
	        'default'			=> 'fa-comments',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'specia_sanitize_html',
		)
	);	
	
	$wp_customize->add_control( 
		'call_action_img_icon',
		array(
		    'label'   => __('Image Icon','gruj'),
		    'section' => 'call_action_content',
			'type'           => 'text',
			'priority'  => 9
		)  
	);
}
add_action( 'customize_register', 'gruj_call_action_setting' );



// Call to action selective refresh
function gruj_home_cta_section_partials( $wp_customize ){
	
	//call_action_review_ttl
	$wp_customize->selective_refresh->add_partial( 'call_action_review_ttl', array(
		'selector'            => '.call-to-action-gruj .ttl',
		'settings'            => 'call_action_review_ttl',
		'render_callback'  => 'gruj_call_action_review_ttl_render_callback',
	) );
	
	//call_action_review_content
	$wp_customize->selective_refresh->add_partial( 'call_action_review_content', array(
		'selector'            => '.call-to-action-gruj .rating',
		'settings'            => 'call_action_review_content',
		'render_callback'  => 'gruj_call_action_review_content_render_callback',
	) );
	
	//call_action_button_title
	$wp_customize->selective_refresh->add_partial( 'call_action_button_title', array(
		'selector'            => '.call-to-action-gruj .call-title',
		'settings'            => 'call_action_button_title',
		'render_callback'  => 'gruj_call_action_button_title_render_callback',
	) );
	
	//call_action_button_title4
	$wp_customize->selective_refresh->add_partial( 'call_action_button_label4', array(
		'selector'            => '.call-to-action-gruj .buton4',
		'settings'            => 'call_action_button_label4',
		'render_callback'  => 'gruj_cta_button_label4_render_callback',
	) );
		
	//call_action_button_link4
	$wp_customize->selective_refresh->add_partial( 'call_action__button_link4', array(
		'selector'            => '.call-to-action-gruj .buton4',
		'settings'            => 'call_action_button_link4',
		'render_callback'  => 'gruj_cta_button_link4_render_callback',
	) );
	
	//call_action_img_icon
	$wp_customize->selective_refresh->add_partial( 'call_action_img_icon', array(
		'selector'            => '.call-to-action-gruj .cta-bg i',
		'settings'            => 'call_action_img_icon',
		'render_callback'  => 'gruj_img_icon_render_callback',
	) );
	}

add_action( 'customize_register', 'gruj_home_cta_section_partials' );

// call_action_review_ttl
function gruj_call_action_review_ttl_render_callback() {
	return get_theme_mod( 'call_action_review_ttl' );
}

// call_action_review_content
function gruj_call_action_review_content_render_callback() {
	return get_theme_mod( 'call_action_review_content' );
}

// call_action_button_title
function gruj_cta_button_title_render_callback() {
	return get_theme_mod( 'call_action_button_title' );
}

// call_action_button_label4
function gruj_cta_button_label4_render_callback() {
	return get_theme_mod( 'call_action_button_label4' );
}

// call_action_button_link4
function gruj_cta_button_link4_render_callback() {
	return get_theme_mod( 'call_action_button_link4' );
}

// call_action_img_icon
function gruj_img_icon_render_callback() {
	return get_theme_mod( 'call_action_img_icon' );
}