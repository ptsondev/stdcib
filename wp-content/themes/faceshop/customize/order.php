<?php 
/**
 * Tạo 1 section mới trong Customizer */
function customizer_order($wp_customize) {
    // Tao section
    $wp_customize->add_section(
		'section_order', array(
			'title' => 'Đặt Hàng',
			'description' => 'Tùy chỉnh ở trang đặt hàng',
			'priority' => 26
        )
    );

    // font, size, color
	$wp_customize->add_setting(
            AIO_ORDER_FONT, array(
            'default' => get_theme_mod(AIO_ORDER_FONT, 'Georgia'),     
			'transport' => 'postMessage'						
            )
    );
	$wp_customize->add_control(
        AIO_ORDER_FONT, array(
            'label' => 'Thông tin giao nhận hàng - Font Chữ',  
            'section' => 'section_order',
            'type' => 'select',
            'choices' => json_decode(AIO_GENERAL_FONTS),
            'settings' => AIO_ORDER_FONT
        )
    );
	$wp_customize->add_setting(
            AIO_ORDER_FONT_SIZE, array(
            'default' => get_theme_mod(AIO_ORDER_FONT_SIZE, 20),    
			'transport' => 'postMessage'						
            )
    );
	$temp = array('14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px');
	$temp = array_combine($temp, $temp);
	$wp_customize->add_control(
        AIO_ORDER_FONT_SIZE, array(
            'label' => 'Thông tin giao nhận hàng - Kích thước chữ',  
            'section' => 'section_order',
            'type' => 'select',
            'choices' => $temp,
            'settings' => AIO_ORDER_FONT_SIZE
        )
    );
	$wp_customize->add_setting(
            AIO_ORDER_FONT_COLOR, array(
            'default' => get_theme_mod(AIO_ORDER_FONT_COLOR, 'orange'),    
			'transport' => 'postMessage'						
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_ORDER_FONT_COLOR, array(
                'label' => 'Thông tin giao nhận hàng - Màu chữ',
                'section' => 'section_order',
                'settings' => AIO_ORDER_FONT_COLOR,
            )
		)
    );
	
	$wp_customize->add_setting(
            AIO_ORDER_BACKGROUND, array(
            'default' => get_theme_mod(AIO_ORDER_BACKGROUND, 'white'),     
			'transport' => 'postMessage'						
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_ORDER_BACKGROUND, array(
                'label' => 'Thông tin giao nhận hàng - Màu nền',
                'section' => 'section_order',
                'settings' => AIO_ORDER_BACKGROUND,
            )
		)
    );
	
	$wp_customize->add_setting(
        AIO_ORDER_BORDER, array(
            'default' => get_theme_mod(AIO_ORDER_BORDER, 1)
        )
    );		
	$wp_customize->add_control(
        AIO_ORDER_BORDER, array(
            'label' => 'Thông tin giao nhận hàng - Khung Viền',
            'section' => 'section_order',
            'type' => 'select',
            'choices' => array(0=>'Không viền', 1=>'Có viền', 2=>'Có viền, nét đứt', 3=>'Có viền, bo tròn góc'),
            'settings' => AIO_ORDER_BORDER
        )
    );		
}
add_action('customize_register', 'customizer_order');
