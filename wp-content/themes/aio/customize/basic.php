<?php 
/**
 * Tạo 1 section mới trong Customizer */
function customizer_basic($wp_customize) {
    // Tao section
    $wp_customize->add_section(
		'section_basic', array(
			'title' => 'Cơ bản',
			'description' => 'Những setting cơ bản của website',
			'priority' => 24
        )
    );

	
	$wp_customize->add_setting(
            AIO_BASIC_SITE_LOGO, array(
            'default' => get_theme_mod(AIO_BASIC_SITE_LOGO, ''),    
 			'transport' => 'postMessage'			
            )
    );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, AIO_BASIC_SITE_LOGO, array(
		'label'    => 'Logo',
		'section'  => 'section_basic',
		'settings' => AIO_BASIC_SITE_LOGO,
	) ) );
	
	
	if(get_option(AIO_IS_CUSTOMIZE, 'no')=='yes'){
		$wp_customize->add_setting(
				AIO_BASIC_PAGE_BACKGROUND, array(
				'default' => get_theme_mod(AIO_BASIC_PAGE_BACKGROUND, '#ffffff'),     
				'transport' => 'postMessage'						
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, AIO_BASIC_PAGE_BACKGROUND, array(
					'label' => 'Toàn trang - Màu nền',
					'section' => 'section_basic',
					'settings' => AIO_BASIC_PAGE_BACKGROUND,
				)
			)
		);
		/*
		$wp_customize->add_setting(
				AIO_BASIC_PAGE_FONT, array(
				'default' => get_theme_mod(AIO_BASIC_PAGE_FONT, 'Georgia'),     
				'transport' => 'postMessage'						
				)
		);
		$wp_customize->add_control(
			AIO_BASIC_PAGE_FONT, array(
				'label' => 'Toàn Trang - Font chữ',  
				'section' => 'section_basic',
				'type' => 'select',
				'choices' => json_decode(AIO_GENERAL_FONTS),
				'settings' => AIO_BASIC_PAGE_FONT
			)
		);
		$wp_customize->add_setting(
				AIO_BASIC_PAGE_FONT_SIZE, array(
				'default' => get_theme_mod(AIO_BASIC_PAGE_FONT_SIZE, 13),    
				'transport' => 'postMessage'						
				)
		);
		$temp = array('14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px');
		$temp = array_combine($temp, $temp);
		$wp_customize->add_control(
			AIO_BASIC_PAGE_FONT_SIZE, array(
				'label' => 'Toàn Trang - Cỡ chữ',  
				'section' => 'section_basic',
				'type' => 'select',
				'choices' => $temp,
				'settings' => AIO_BASIC_PAGE_FONT_SIZE
			)
		);*/
		$wp_customize->add_setting(
				AIO_BASIC_PAGE_FONT_COLOR, array(
				'default' => get_theme_mod(AIO_BASIC_PAGE_FONT_COLOR, 'orange'),    
				'transport' => 'postMessage'						
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, AIO_BASIC_PAGE_FONT_COLOR, array(
					'label' => 'Toàn Trang - Màu chữ',
					'section' => 'section_basic',
					'settings' => AIO_BASIC_PAGE_FONT_COLOR,
				)
			)
		);
		
		$wp_customize->add_setting(
				AIO_BASIC_BUTTON_BACKGROUND, array(
				'default' => get_theme_mod(AIO_BASIC_BUTTON_BACKGROUND, '#96C346'),     
				'transport' => 'postMessage'						
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, AIO_BASIC_BUTTON_BACKGROUND, array(
					'label' => 'Các nút nhấn - Màu nền',
					'section' => 'section_basic',
					'settings' => AIO_BASIC_BUTTON_BACKGROUND,
				)
			)
		);
		
		$wp_customize->add_setting(
				AIO_BASIC_BUTTON_COLOR, array(
				'default' => get_theme_mod(AIO_BASIC_BUTTON_COLOR, '#ffffff'),     
				'transport' => 'postMessage'						
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, AIO_BASIC_BUTTON_COLOR, array(
					'label' => 'Các nút nhấn - Màu chữ',
					'section' => 'section_basic',
					'settings' => AIO_BASIC_BUTTON_COLOR,
				)
			)
		);
		
		// font, size, color
		$wp_customize->add_setting(
				AIO_BASIC_BLOCK_TITLE_FONT, array(
				'default' => get_theme_mod(AIO_BASIC_BLOCK_TITLE_FONT, 'Georgia'),     
				'transport' => 'postMessage'						
				)
		);
		$wp_customize->add_control(
			AIO_BASIC_BLOCK_TITLE_FONT, array(
				'label' => 'Tiêu đề các block - Font chữ',  
				'section' => 'section_basic',
				'type' => 'select',
				'choices' => json_decode(AIO_GENERAL_FONTS),
				'settings' => AIO_BASIC_BLOCK_TITLE_FONT
			)
		);
		$wp_customize->add_setting(
				AIO_BASIC_BLOCK_TITLE_FONT_SIZE, array(
				'default' => get_theme_mod(AIO_BASIC_BLOCK_TITLE_SIZE, 20),    
				'transport' => 'postMessage'						
				)
		);
		$temp = array('14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px');
		$temp = array_combine($temp, $temp);
		$wp_customize->add_control(
			AIO_BASIC_BLOCK_TITLE_FONT_SIZE, array(
				'label' => 'Tiêu đề các block - Cỡ chữ',  
				'section' => 'section_basic',
				'type' => 'select',
				'choices' => $temp,
				'settings' => AIO_BASIC_BLOCK_TITLE_FONT_SIZE
			)
		);
		$wp_customize->add_setting(
				AIO_BASIC_BLOCK_TITLE_FONT_COLOR, array(
				'default' => get_theme_mod(AIO_BASIC_BLOCK_TITLE_COLOR, 'orange'),    
				'transport' => 'postMessage'						
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, AIO_BASIC_BLOCK_TITLE_FONT_COLOR, array(
					'label' => 'Tiêu đề các block - Màu chữ',
					'section' => 'section_basic',
					'settings' => AIO_BASIC_BLOCK_TITLE_FONT_COLOR,
				)
			)
		);
		
		$wp_customize->add_setting(
				AIO_BASIC_PAGING_BACKGROUND, array(
				'default' => get_theme_mod(AIO_BASIC_PAGING_BACKGROUND, 'white'),     
				'transport' => 'postMessage'						
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, AIO_BASIC_PAGING_BACKGROUND, array(
					'label' => 'Phân trang - Màu nền',
					'section' => 'section_basic',
					'settings' => AIO_BASIC_PAGING_BACKGROUND,
				)
			)
		);
		$wp_customize->add_setting(
				AIO_BASIC_PAGING_COLOR, array(
				'default' => get_theme_mod(AIO_BASIC_PAGING_COLOR, 'green'),     
				'transport' => 'postMessage'						
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, AIO_BASIC_PAGING_COLOR, array(
					'label' => 'Phân trang - Màu chữ',
					'section' => 'section_basic',
					'settings' => AIO_BASIC_PAGING_COLOR,
				)
			)
		);
	}
}
add_action('customize_register', 'customizer_basic');
