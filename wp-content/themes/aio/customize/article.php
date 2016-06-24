<?php 

/**
 * Tạo 1 section mới trong Customizer */
function customizer_article($wp_customize) {
    // Tao section
    $wp_customize->add_section(
        'section_ARTICLE', array(
            'title' => 'Bài Viết',
            'description' => 'Hiển thị danh sách bài viết (Bấm vào trang bài viết ở phần bên phải để xem các thay đổi 1 cách trực quan)',
            'priority' => 25
        )
    );	

    $wp_customize->add_setting(
        AIO_ARTICLE_NUM_PER_PAGE, array(
            'default' => get_theme_mod(AIO_ARTICLE_NUM_PER_PAGE, 10)
        )
    );
	$wp_customize->add_control(
        AIO_ARTICLE_NUM_PER_PAGE, array(
            'label' => 'Số bài viết ở mỗi trang',
            'section' => 'section_ARTICLE',
            'type' => 'select',
            'choices' => array(8=>8, 9=>9, 10=>10, 12=>12, 18=>18, 24=>24, 30=>30),
            'settings' => AIO_ARTICLE_NUM_PER_PAGE
        )
    );
	
    $wp_customize->add_setting(
        AIO_ARTICLE_DISPLAY_TYPE, array(
            'default' => get_theme_mod(AIO_ARTICLE_DISPLAY_TYPE, 1)
        )
    );
    $wp_customize->add_control(
        'control_ARTICLE_home_type', array(
            'label' => 'Hiển thị từng bài viết theo dạng',
            'section' => 'section_ARTICLE',
            'type' => 'select',
            'choices' => array(1=>'Trên - dưới', 2=>'Trái - phải'),
            'settings' => AIO_ARTICLE_DISPLAY_TYPE
        )
    );	
	
	$wp_customize->add_setting(
        AIO_ARTICLE_BORDER, array(
            'default' => get_theme_mod(AIO_ARTICLE_BORDER, 1)
        )
    );		
	$wp_customize->add_control(
        'control_ARTICLE_home_border', array(
            'label' => 'Khung viền cho từng bài viết',
            'section' => 'section_ARTICLE',
            'type' => 'select',
            'choices' => array(0=>'Không viền', 1=>'Có viền', 2=>'Có viền, nét đứt', 3=>'Có viền, bo tròn góc'),
            'settings' => AIO_ARTICLE_BORDER
        )
    );		
	
	$wp_customize->add_setting(
            AIO_ARTICLE_BACKGROUND, array(
            'default' => get_theme_mod(AIO_ARTICLE_BACKGROUND, '#ffffff'),    
 			'transport' => 'postMessage'			
            )
    );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
            $wp_customize, AIO_ARTICLE_BACKGROUND, array(
                'label' => 'Màu nền bài viết',
                'section' => 'section_ARTICLE',
                'settings' => AIO_ARTICLE_BACKGROUND,
            )
		)
    );
	
	$wp_customize->add_setting(
        AIO_ARTICLE_NUM_RELATED, array(
            'default' => get_theme_mod(AIO_ARTICLE_NUM_RELATED, 3)
        )
    );
	$wp_customize->add_control(
        AIO_ARTICLE_NUM_RELATED, array(
            'label' => 'Số bài viết liên quan (Hiện ở trang chi tiết bài viết)',
            'section' => 'section_ARTICLE',
            'type' => 'select',
            'choices' => array(3=>3, 4=>4, 5=>5, 6=>6, 8=>8, 9=>9),
            'settings' => AIO_ARTICLE_NUM_RELATED
        )
    );
}
add_action('customize_register', 'customizer_article');
