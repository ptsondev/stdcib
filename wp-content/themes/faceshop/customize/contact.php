<?php 


/**
 * Tạo 1 section mới trong Customizer */
function customizer_contact($wp_customize) {
    // T?o section
    $wp_customize->add_section(
            'section_contact', array(
        'title' => 'Liên Hệ',
        'description' => 'Thông tin liên hệ',
        'priority' => 25
            )
    );

    // T?o setting
    $wp_customize->add_setting(
            'address', array(
        'default' => '211/58 Hoàng Văn Thụ, F8, Q.Phú Nhuận, TP.HCM',
            )
    );   
    $wp_customize->add_setting(
            'skype', array(
        'default' => 'ptson89'
            )
    );
    $wp_customize->add_setting(
            'phone', array(
        'default' => '0908.143.576'
            )
    );
    $wp_customize->add_setting(
            'hotline', array(
        'default' => '0839976852'
            )
    );
    $wp_customize->add_setting(
            'email', array(
        'default' => 'ptson@snh.vn'
            )
    );


    // T?o coltrol
    $wp_customize->add_control(
            'control_adress', array(
        'label' => 'Địa chỉ',
        'section' => 'section_contact',
        'type' => 'text',
        'settings' => 'address'
            )
    );   
    $wp_customize->add_control(
            'control_skype', array(
        'label' => 'Skype',
        'section' => 'section_contact',
        'type' => 'text',
        'settings' => 'skype'
            )
    );
    $wp_customize->add_control(
            'control_phone', array(
        'label' => 'Điện thoại',
        'section' => 'section_contact',
        'type' => 'text',
        'settings' => 'phone'
            )
    );
    $wp_customize->add_control(
            'control_hotline', array(
        'label' => 'Hotline',
        'section' => 'section_contact',
        'type' => 'text',
        'settings' => 'hotline'
            )
    );
    $wp_customize->add_control(
            'control_email', array(
        'label' => 'Email',
        'section' => 'section_contact',
        'type' => 'text',
        'settings' => 'email'
            )
    );
}
add_action('customize_register', 'customizer_contact');
