<?php

/**
 * Tạo 1 section mới trong Customizer */
function customizer_sidebar($wp_customize) {
    // Tao section
    $wp_customize->add_section(
            'section_sidebar', array(
        'title' => 'Sidebar',
        'description' => '',
        'priority' => 24
            )
    );

	$wp_customize->add_setting(
        AIO_SIDEBAR_POSITION, array(
            'default' => get_theme_mod(AIO_SIDEBAR_POSITION, 1)
        )
    );
	$wp_customize->add_control(
        AIO_SIDEBAR_POSITION, array(
            'label' => 'Sidebar - Vị trí hiển thị',
            'section' => 'section_sidebar',
            'type' => 'radio',
            'choices' => array('left'=>'Bên Phải', 'right'=>'Bên Trái'),
            'settings' => AIO_SIDEBAR_POSITION
        )
    );		
	
    $wp_customize->add_setting(
            AIO_SIDEBAR_CATEGORY_BACKGROUND, array(
            'default' => get_theme_mod(AIO_SIDEBAR_CATEGORY_BACKGROUND, '#ff0000'),    
 			'transport' => 'postMessage'			
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_SIDEBAR_CATEGORY_BACKGROUND, array(
                'label' => 'Nhóm sản phẩm - màu nền',
                'section' => 'section_sidebar',
                'settings' => AIO_SIDEBAR_CATEGORY_BACKGROUND,
            )
		)
    );
	
    $wp_customize->add_setting(
            AIO_SIDEBAR_CATEGORY_COLOR, array(
            'default' => get_theme_mod(AIO_SIDEBAR_CATEGORY_COLOR, '#ff0000'),     
			'transport' => 'postMessage'						
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_SIDEBAR_CATEGORY_COLOR, array(
                'label' => 'Nhóm sản phẩm - màu chữ',
                'section' => 'section_sidebar',
                'settings' => AIO_SIDEBAR_CATEGORY_COLOR,
            )
		)
    );
	
	$wp_customize->add_setting(
        AIO_SIDEBAR_PRODUCT_NUMBER, array(
            'default' => get_theme_mod(AIO_SIDEBAR_PRODUCT_NUMBER, 5)
        )
    );
	$wp_customize->add_control(
        AIO_SIDEBAR_PRODUCT_NUMBER, array(
            'label' => 'Sản phẩm yêu thích - số lượng',
            'section' => 'section_sidebar',
            'type' => 'select',
            'choices' => array(1=>1,2=>2,3=>3, 5=>5, 8=>8, 10=>10, 15=>15),
            'settings' => AIO_SIDEBAR_PRODUCT_NUMBER
        )
    );
	
	$wp_customize->add_setting(
        AIO_SIDEBAR_PRODUCT_TYPE, array(
            'default' => get_theme_mod(AIO_SIDEBAR_PRODUCT_TYPE, 1)
        )
    );
	$wp_customize->add_control(
        AIO_SIDEBAR_PRODUCT_TYPE, array(
            'label' => 'Sản phẩm yêu thích - Cách hiển thị',
            'section' => 'section_sidebar',
            'type' => 'select',
            'choices' => array(1=>'Trên - dưới', 2=>'Trái - phải'),
            'settings' => AIO_SIDEBAR_PRODUCT_TYPE
        )
    );	
	
	$wp_customize->add_setting(
        AIO_SIDEBAR_PRODUCT_BORDER, array(
            'default' => get_theme_mod(AIO_SIDEBAR_PRODUCT_BORDER, 1)
        )
    );
	$wp_customize->add_control(
        AIO_SIDEBAR_PRODUCT_BORDER, array(
            'label' => 'Sản phẩm yêu thích - Khung viền',
            'section' => 'section_sidebar',
            'type' => 'select',
            'choices' => array(0=>'Không viền', 1=>'Có viền', 2=>'Có viền, nét đứt', 3=>'Có viền, bo tròn góc'),
            'settings' => AIO_SIDEBAR_PRODUCT_BORDER
        )
    );		
	
	$wp_customize->add_setting(
        AIO_SIDEBAR_IS_DISPLAY_CONTACT_INFO, array(
            'default' => get_theme_mod(AIO_SIDEBAR_IS_DISPLAY_CONTACT_INFO, 1)
        )
    );
	$wp_customize->add_control(
        AIO_SIDEBAR_IS_DISPLAY_CONTACT_INFO, array(
            'label' => 'Thông tin liên hệ',
            'section' => 'section_sidebar',
            'type' => 'radio',
            'choices' => array(0=>'Không hiển thị', 1=>'Có hiển thị'),
            'settings' => AIO_SIDEBAR_IS_DISPLAY_CONTACT_INFO
        )
    );		
	
	$wp_customize->add_setting(
        AIO_SIDEBAR_CONTACT_BORDER, array(
            'default' => get_theme_mod(AIO_SIDEBAR_CONTACT_BORDER, 1)
        )
    );
	$wp_customize->add_control(
        AIO_SIDEBAR_CONTACT_BORDER, array(
            'label' => 'Thông tin liên hệ - khung viền',
            'section' => 'section_sidebar',
            'type' => 'select',
            'choices' => array(0=>'Không viền', 1=>'Có viền', 2=>'Có viền, nét đứt', 3=>'Có viền, bo tròn góc'),
            'settings' => AIO_SIDEBAR_CONTACT_BORDER
        )
    );		
	
	$wp_customize->add_setting(
            AIO_SIDEBAR_CONTACT_BACKGROUND, array(
            'default' => get_theme_mod(AIO_SIDEBAR_CONTACT_BACKGROUND, '#ffffff'),    
 			'transport' => 'postMessage'			
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_SIDEBAR_CONTACT_BACKGROUND, array(
                'label' => 'Thông tin liên hệ - màu nền',
                'section' => 'section_sidebar',
                'settings' => AIO_SIDEBAR_CONTACT_BACKGROUND,
            )
		)
    );
}

add_action('customize_register', 'customizer_sidebar');
