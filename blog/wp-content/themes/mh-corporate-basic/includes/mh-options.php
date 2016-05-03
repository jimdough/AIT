<?php

function mh_customize_register($wp_customize) {

	/***** Register Custom Controls *****/

	class MH_Customize_Header_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

	class MH_Customize_Text_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="textfield"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

    class MH_Customize_Button_Control extends WP_Customize_Control {
        public function render_content() {  ?>
			<p>
				<a href="<?php echo esc_url('http://www.mhthemes.com/themes/mh/corporate/'); ?>" target="_blank" class="button button-secondary"><?php echo esc_html($this->label); ?></a>
			</p> <?php
        }
    }

	/***** Add Sections *****/

	$wp_customize->add_section('mh_general', array('title' => __('Theme Options', 'mh-corporate-basic'), 'priority' => 1));
	$wp_customize->add_section('mh_upgrade', array('title' => __('Upgrade to Premium', 'mh-corporate-basic'), 'priority' => 999));

    /***** Add Settings *****/

    $wp_customize->add_setting('mhc_options[excerpt_length]', array('default' => '300', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_integer'));
    $wp_customize->add_setting('mhc_options[excerpt_more]', array('default' => '[...]', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_text'));
    $wp_customize->add_setting('mhc_options[sb_position]', array('default' => 'right', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_select'));
    $wp_customize->add_setting('mhc_options[full_bg]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'mh_sanitize_checkbox'));
	$wp_customize->add_setting('mhc_options[premium_version_label]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_setting('mhc_options[premium_version_text]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_setting('mhc_options[premium_version_button]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));

    /***** Add Controls *****/

    $wp_customize->add_control('excerpt_length', array('label' => __('Custom Excerpt Length in Characters', 'mh-corporate-basic'), 'section' => 'mh_general', 'settings' => 'mhc_options[excerpt_length]', 'priority' => 1, 'type' => 'text'));
    $wp_customize->add_control('excerpt_more', array('label' => __('Custom Excerpt More-Text', 'mh-corporate-basic'), 'section' => 'mh_general', 'settings' => 'mhc_options[excerpt_more]', 'priority' => 2, 'type' => 'text'));
    $wp_customize->add_control('sb_position', array('label' => __('Position of Sidebar', 'mh-corporate-basic'), 'section' => 'mh_general', 'settings' => 'mhc_options[sb_position]', 'priority' => 3, 'type' => 'select', 'choices' => array('left' => __('Left', 'mh-corporate-basic'), 'right' => __('Right', 'mh-corporate-basic'))));
	$wp_customize->add_control('full_bg', array('label' => __('Scale Background Image to Full Size', 'mh-corporate-basic'), 'section' => 'background_image', 'settings' => 'mhc_options[full_bg]', 'priority' => 99, 'type' => 'checkbox'));
	$wp_customize->add_control(new MH_Customize_Header_Control($wp_customize, 'premium_version_label', array('label' => __('Need more features and options?', 'mh-corporate-basic'), 'section' => 'mh_upgrade', 'settings' => 'mhc_options[premium_version_label]', 'priority' => 1)));
	$wp_customize->add_control(new MH_Customize_Text_Control($wp_customize, 'premium_version_text', array('label' => __('Check out the Premium Version of this theme which comes with additional features and advanced customization options for your website.', 'mh-corporate-basic'), 'section' => 'mh_upgrade', 'settings' => 'mhc_options[premium_version_text]', 'priority' => 2)));
	$wp_customize->add_control(new MH_Customize_Button_Control($wp_customize, 'premium_version_button', array('label' => __('Learn more about the Premium Version', 'mh-corporate-basic'), 'section' => 'mh_upgrade', 'settings' => 'mhc_options[premium_version_button]', 'priority' => 3)));
}
add_action('customize_register', 'mh_customize_register');

/***** Data Sanitization *****/

function mh_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}
function mh_sanitize_integer($input) {
    return strip_tags(intval($input));
}
function mh_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}
function mh_sanitize_select($input) {
    $valid = array(
        'left' => __('Left', 'mh-corporate-basic'),
        'right' => __('Right', 'mh-corporate-basic')
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

/***** Return Theme Options / Set Default Options *****/

if (!function_exists('mh_theme_options')) {
	function mh_theme_options() {
		$theme_options = wp_parse_args(
			get_option('mhc_options', array()),
			mh_theme_default_options()
		);
		return $theme_options;
	}
}

if (!function_exists('mh_theme_default_options')) {
	function mh_theme_default_options() {
		$default_options = array(
			'excerpt_length' => '175',
			'excerpt_more' => '[...]',
			'sb_position' => 'right',
			'full_bg' => ''
		);
		return $default_options;
	}
}

?>