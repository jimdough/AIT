<?php

/**
 * megaresponsive-lite Theme Customizer
 *
 * @package megaresponsive-lite

 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.

 */

function cwp_megar_customize_register( $wp_customize ) {

	class megaresponsive_lite_Theme_Support extends WP_Customize_Control
	{
		public function render_content()
		{

		}

	} 

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* theme notes */
	$wp_customize->add_section( 'codeinwp_theme_notes' , array(
		'title'      => __('ThemeIsle theme notes','megaresponsive-lite'),
		'description' => sprintf( __( "Thank you for being part of this! We've spent almost 6 months building ThemeIsle without really knowing if anyone will ever use a theme or not, so we're very grateful that you've decided to work with us. Wanna <a href='http://themeisle.com/contact/' target='_blank'>say hi</a>?<br/><br/><a href='http://themeisle.com/demo/?theme=MegaResponsive' target='_blank'>View Theme Demo</a> | <a href='http://themeisle.com/forums/forum/megaresponsive-lite' target='_blank'>Get theme support</a><br/><br/><a href='http://themeisle.com/documentation-megaresponsive' target='_blank'>Documentation</a>",'megaresponsive-lite')),'priority'   => 30,
	));
	$wp_customize->add_setting(
        'codeinwp_theme_notes'
	, array('sanitize_callback' => 'esc_url_raw'));
	 $wp_customize->add_control( new megaresponsive_lite_Theme_Support( $wp_customize, 'codeinwp_theme_notes',
	    array(
	        'section' => 'codeinwp_theme_notes',
	   )
	));

    
	/* logo */
	$wp_customize->add_section( 'themeslug_logo_section' , array(

		'title'       => __( 'Logo', 'megaresponsive-lite' ),

		'priority'    => 31,

		'description' => 'Upload a logo to replace the default site name and description in the header',

	) );



	$wp_customize->add_setting( 'megaresponsive_lite_logo', array('sanitize_callback' => 'esc_url_raw'));



	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'megaresponsive_lite_logo', array(

		'label'    => __( 'Logo', 'megaresponsive-lite' ),

		'section'  => 'themeslug_logo_section',

		'settings' => 'megaresponsive_lite_logo',

	) ) );       

    
	/* email address for contact form */
    $wp_customize->add_section( 'megaresponsive_lite_email_section' , array(
    		'title'       => __( 'Email for contact form', 'megaresponsive-lite' ),
    		'priority'    => 130,
	));
 
	$wp_customize->add_setting( 'megaresponsive_lite_email', array('sanitize_callback' => 'is_email') );
	$wp_customize->add_control( 'megaresponsive_lite_email', array(
			'label'    => __( 'Email address', 'megaresponsive-lite' ),
	      	'section'  => 'megaresponsive_lite_email_section',
	      	'settings' => 'megaresponsive_lite_email',
			'priority'    => 1,
	));

    

    

}

add_action( 'customize_register', 'cwp_megar_customize_register' );



/**

 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.

 */

function cwp_megar_customize_preview_js() {

	wp_enqueue_script( 'cwp_megar_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

}

add_action( 'customize_preview_init', 'cwp_megar_customize_preview_js' );
