<?php 

/**
 * Tạo 1 section mới trong Customizer */
function customizer_slideshow($wp_customize) {
    // Tao section
    $wp_customize->add_section(
       'section_slideshow', array(
			'title' => 'Slideshow',
			'description' => 'Tùy chỉnh Slideshow hình ảnh ở đầu mỗi trang',
			'priority' => 24
		)
    );
	
	$wp_customize->add_setting(
        AIO_SLIDESHOW_IS_DISPLAY_ALL_PAGE, array(
            'default' => get_theme_mod(AIO_SLIDESHOW_IS_DISPLAY_ALL_PAGE, 1)
        )
    );
	$wp_customize->add_control(
        AIO_SLIDESHOW_IS_DISPLAY_ALL_PAGE, array(
            'label' => 'Slideshow - Hiển thị',
            'section' => 'section_slideshow',
            'type' => 'radio',
            'choices' => array(0=>'Chỉ hiện ở trang chủ', 1=>'Hiện ở tất cả các trang'),
            'settings' => AIO_SLIDESHOW_IS_DISPLAY_ALL_PAGE
        )
    );		

	$wp_customize->add_setting(
        AIO_SLIDESHOW_TYPE, array(
            'default' => get_theme_mod(AIO_SLIDESHOW_TYPE, 1)
        )
    );
	$wp_customize->add_control(
        'control_slide_type', array(
            'label' => 'Hiển thị slide theo dạng',
            'section' => 'section_slideshow',
            'type' => 'select',
            'choices' => array(1=>'Tách 2 cột', 2=>'Full màn hình'),
            'settings' => AIO_SLIDESHOW_TYPE
        )
    );
	
	 $wp_customize->add_setting(
            AIO_SLIDESHOW_BACKGROUND, array(
            'default' => get_theme_mod(AIO_SLIDESHOW_BACKGROUND, '#F5F4F4'),    
 			'transport' => 'postMessage'			
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_SLIDESHOW_BACKGROUND, array(
                'label' => 'Slideshow - màu nền',
                'section' => 'section_slideshow',
                'settings' => AIO_SLIDESHOW_BACKGROUND,
            )
		)
    );
}
add_action('customize_register', 'customizer_slideshow');
