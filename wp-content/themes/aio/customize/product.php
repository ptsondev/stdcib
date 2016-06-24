<?php 

/**
 * Tạo 1 section mới trong Customizer */
function customizer_product($wp_customize) {
    // Tao section
    $wp_customize->add_section(
        'section_product', array(
            'title' => 'Sản phẩm',
            'description' => 'Tùy chỉnh liên quan đến sản phẩm',
            'priority' => 25
        )
    );	

	/*
	$wp_customize->add_setting(
        AIO_PRODUCT_IS_ONLY1, array(
            'default' => get_theme_mod(AIO_PRODUCT_IS_ONLY1, 3)
        )
    );
	$wp_customize->add_control(
        AIO_PRODUCT_IS_ONLY1, array(
            'label' => 'Shop của bạn kinh doanh bao nhiêu sản phẩm?',
            'section' => 'section_product',
            'type' => 'radio',
            'choices' => array(2=>'Nhiều sản phẩm => Hiển thị danh sách sản phẩm', 1=>'Chỉ 1 sản phẩm => Hiển thị nội dung từ trang sản phẩm đã nhập'),
            'settings' => AIO_PRODUCT_IS_ONLY1
        )
    );
	*/
	
	if (get_option(AIO_IS_RESPONSIVE, 'no')=='yes') {
		$wp_customize->add_setting(
			AIO_PRODUCT_NUM_COL, array(
				'default' => get_theme_mod(AIO_PRODUCT_NUM_COL, 3)
			)
		);
		$wp_customize->add_control(
			AIO_PRODUCT_NUM_COL, array(
				'label' => 'Số cột sản phẩm (số sp/dòng)',
				'section' => 'section_product',
				'type' => 'select',
				'choices' => array(6=>2, 4=>3, 3=>4),
				'settings' => AIO_PRODUCT_NUM_COL
			)
		);
	}
	
    $wp_customize->add_setting(
        AIO_PRODUCT_NUM_PER_PAGE, array(
            'default' => get_theme_mod(AIO_PRODUCT_NUM_PER_PAGE, 12)
        )
    );
	$wp_customize->add_control(
        AIO_PRODUCT_NUM_PER_PAGE, array(
            'label' => 'Số sản phẩm ở mỗi trang',
            'section' => 'section_product',
            'type' => 'select',
            'choices' => array(8=>8, 9=>9, 12=>12, 18=>18, 24=>24, 30=>30),
            'settings' => AIO_PRODUCT_NUM_PER_PAGE
        )
    );
	
    $wp_customize->add_setting(
        AIO_PRODUCT_DISPLAY_TYPE, array(
            'default' => get_theme_mod(AIO_PRODUCT_DISPLAY_TYPE, 1)
        )
    );
    $wp_customize->add_control(
        'control_product_home_type', array(
            'label' => 'Hiển thị từng sản phẩm theo dạng',
            'section' => 'section_product',
            'type' => 'select',
            'choices' => array(1=>'Trên - dưới', 2=>'Trái - phải'),
            'settings' => AIO_PRODUCT_DISPLAY_TYPE
        )
    );	
	
	$wp_customize->add_setting(
        AIO_PRODUCT_BORDER, array(
            'default' => get_theme_mod(AIO_PRODUCT_BORDER, 1)
        )
    );		
	$wp_customize->add_control(
        'control_product_home_border', array(
            'label' => 'Khung viền cho từng sản phẩm',
            'section' => 'section_product',
            'type' => 'select',
            'choices' => array(0=>'Không viền', 1=>'Có viền', 2=>'Có viền, nét đứt', 3=>'Có viền, bo tròn góc'),
            'settings' => AIO_PRODUCT_BORDER
        )
    );		
	
	$wp_customize->add_setting(
            AIO_PRODUCT_BACKGROUND, array(
            'default' => get_theme_mod(AIO_PRODUCT_BACKGROUND, '#ffffff'),    
 			'transport' => 'postMessage'			
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_PRODUCT_BACKGROUND, array(
                'label' => 'Màu nền sản phẩm',
                'section' => 'section_product',
                'settings' => AIO_PRODUCT_BACKGROUND,
            )
		)
    );
	
	$wp_customize->add_setting(
        AIO_PRODUCT_NUM_RELATED, array(
            'default' => get_theme_mod(AIO_PRODUCT_NUM_RELATED, 3)
        )
    );
	$wp_customize->add_control(
        AIO_PRODUCT_NUM_RELATED, array(
            'label' => 'Số sản phẩm liên quan (Hiện ở trang chi tiết sản phẩm)',
            'section' => 'section_product',
            'type' => 'select',
            'choices' => array(3=>3, 4=>4, 6=>6, 8=>8, 9=>9),
            'settings' => AIO_PRODUCT_NUM_RELATED
        )
    );
	
	$wp_customize->add_setting(
            AIO_PRODUCT_SALE_ICON, array(
            'default' => get_theme_mod(AIO_PRODUCT_SALE_ICON, ''),    
 			'transport' => 'postMessage'			
            )
    );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, AIO_PRODUCT_SALE_ICON, array(
		'label'    => 'Sale icon',
		'section'  => 'section_product',
		'settings' => AIO_PRODUCT_SALE_ICON,
	) ) );
		
}
add_action('customize_register', 'customizer_product');
