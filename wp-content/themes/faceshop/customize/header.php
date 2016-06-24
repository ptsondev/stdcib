<?php 

/**
 * Tạo 1 section mới trong Customizer */
function customizer_header($wp_customize) {
    // Tao section
    $wp_customize->add_section(
       'section_header', array(
			'title' => 'Header - Phần trên',
			'description' => 'Tùy chỉnh Header (Phần trên cùng trang): menu, hotline',
			'priority' => 24
		)
    );
	
	// menu font, size, color
	$wp_customize->add_setting(
            AIO_HEADER_MENU_FONT, array(
            'default' => get_theme_mod(AIO_HEADER_MENU_FONT, 'Georgia'),     
			'transport' => 'postMessage'						
            )
    );
	$wp_customize->add_control(
        AIO_HEADER_MENU_FONT, array(
            'label' => 'Menu chính - Font chữ',  
            'section' => 'section_header',
            'type' => 'select',
            'choices' => json_decode(AIO_GENERAL_FONTS),
            'settings' => AIO_HEADER_MENU_FONT
        )
    );
	$wp_customize->add_setting(
            AIO_HEADER_MENU_FONT_SIZE, array(
            'default' => get_theme_mod(AIO_HEADER_MENU_FONT_SIZE, 20),    
			'transport' => 'postMessage'						
            )
    );
	$temp = array('14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px');
	$temp = array_combine($temp, $temp);
	$wp_customize->add_control(
        AIO_HEADER_MENU_FONT_SIZE, array(
            'label' => 'Menu chính - Cỡ chữ',  
            'section' => 'section_header',
            'type' => 'select',
            'choices' => $temp,
            'settings' => AIO_HEADER_MENU_FONT_SIZE
        )
    );
	$wp_customize->add_setting(
            AIO_HEADER_MENU_FONT_COLOR, array(
            'default' => get_theme_mod(AIO_HEADER_MENU_FONT_COLOR, 'orange'),    
			'transport' => 'postMessage'						
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_HEADER_MENU_FONT_COLOR, array(
                'label' => 'Menu chính - Màu chữ',
                'section' => 'section_header',
                'settings' => AIO_HEADER_MENU_FONT_COLOR,
            )
		)
    );
	$wp_customize->add_setting(
            AIO_HEADER_MENU_HOVER_FONT_COLOR, array(
            'default' => get_theme_mod(AIO_HEADER_MENU_HOVER_FONT_COLOR, 'orange'),    
			'transport' => 'postMessage'						
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_HEADER_MENU_HOVER_FONT_COLOR, array(
                'label' => 'Menu chính - Màu chữ khi hover/active',
                'section' => 'section_header',
                'settings' => AIO_HEADER_MENU_HOVER_FONT_COLOR,
            )
		)
    );
	
	// hotline font, size, color
	$wp_customize->add_setting(
            AIO_HEADER_HOTLINE_FONT, array(
            'default' => get_theme_mod(AIO_HEADER_HOTLINE_FONT, 'Georgia'),     
			'transport' => 'postMessage'						
            )
    );
	$wp_customize->add_control(
        AIO_HEADER_HOTLINE_FONT, array(
            'label' => 'Hotline - Font chữ',  
            'section' => 'section_header',
            'type' => 'select',
            'choices' => json_decode(AIO_GENERAL_FONTS),
            'settings' => AIO_HEADER_HOTLINE_FONT
        )
    );
	$wp_customize->add_setting(
            AIO_HEADER_HOTLINE_FONT_SIZE, array(
            'default' => get_theme_mod(AIO_HEADER_HOTLINE_FONT_SIZE, 20),    
			'transport' => 'postMessage'						
            )
    );
	$temp = array('14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px');
	$temp = array_combine($temp, $temp);
	$wp_customize->add_control(
        AIO_HEADER_HOTLINE_FONT_SIZE, array(
            'label' => 'Hotline - Cỡ chữ',  
            'section' => 'section_header',
            'type' => 'select',
            'choices' => $temp,
            'settings' => AIO_HEADER_HOTLINE_FONT_SIZE
        )
    );
	$wp_customize->add_setting(
            AIO_HEADER_HOTLINE_FONT_COLOR, array(
            'default' => get_theme_mod(AIO_HEADER_HOTLINE_FONT_COLOR, 'orange'),    
			'transport' => 'postMessage'						
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_HEADER_HOTLINE_FONT_COLOR, array(
                'label' => 'Hotline - Màu chữ',
                'section' => 'section_header',
                'settings' => AIO_HEADER_HOTLINE_FONT_COLOR,
            )
		)
    );
}
add_action('customize_register', 'customizer_header');
