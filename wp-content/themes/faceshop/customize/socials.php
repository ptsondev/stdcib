<?php 

/**
 * Tạo 1 section mới trong Customizer */
function customizer_socials($wp_customize) {
    // T?o section
    $wp_customize->add_section(
		'section_socials', array(
			'title' => 'Mạng xã hội',
			'description' => 'Link mạng xã hội',
			'priority' => 25
        )
    );

    // Settings
    $wp_customize->add_setting(
        'link_facebook', array(
			'default' => 'http://facebook.com/'
        )
    );
	$wp_customize->add_setting(
        'link_plus', array(
			'default' => 'http://'
        )
    );
	$wp_customize->add_setting(
        'link_youtube', array(
			'default' => 'http://'
        )
    );
	$wp_customize->add_setting(
        'link_twitter', array(
			'default' => 'http://'
        )
    );
	$wp_customize->add_setting(
        'link_pinterest', array(
			'default' => 'http://'
        )
    );
	$wp_customize->add_setting(
        'link_instagram', array(
			'default' => 'http://'
        )
    );
	$wp_customize->add_setting(
        'link_flickr', array(
			'default' => 'http://'
        )
    );


    // Controls
    $wp_customize->add_control(
        'control_link_facebook', array(
			'label' => 'Facebook',
			'section' => 'section_socials',
			'type' => 'text',
			'settings' => 'link_facebook'
        )
    );
	$wp_customize->add_control(
        'control_link_plus', array(
			'label' => 'Google Plus',
			'section' => 'section_socials',
			'type' => 'text',
			'settings' => 'link_plus'
        )
    );
	$wp_customize->add_control(
        'control_link_youtube', array(
			'label' => 'Youtube',
			'section' => 'section_socials',
			'type' => 'text',
			'settings' => 'link_youtube'
        )
    );
	$wp_customize->add_control(
        'control_link_twitter', array(
			'label' => 'Twitter',
			'section' => 'section_socials',
			'type' => 'text',
			'settings' => 'link_twitter'
        )
    );
	$wp_customize->add_control(
        'control_link_pinterest', array(
			'label' => 'Pinterest',
			'section' => 'section_socials',
			'type' => 'text',
			'settings' => 'link_pinterest'
        )
    );
	$wp_customize->add_control(
        'control_link_instagram', array(
			'label' => 'Instagram',
			'section' => 'section_socials',
			'type' => 'text',
			'settings' => 'link_instagram'
        )
    );
    $wp_customize->add_control(
        'control_link_flickr', array(
			'label' => 'Flickr',
			'section' => 'section_socials',
			'type' => 'text',
			'settings' => 'link_flickr'
        )
    );
}
add_action('customize_register', 'customizer_socials');
