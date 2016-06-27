<?php

// init OPTION before clone
define('AIO_IS_RESPONSIVE', 'aio_is_responsive');
define('AIO_IS_CUSTOMIZE', 'aio_is_customize');
define('AIO_IS_CART', 'aio_is_cart');
define('AIO_MENU_EDITABLE', 'aio_menu_editable');

// THEME MOD
define('AIO_BASIC_SITE_TITLE', 'aio_basic_site_title');
define('AIO_BASIC_SITE_LOGO', 'aio_basic_site_logo');
define('AIO_BASIC_PAGE_BACKGROUND', 'aio_basic_page_background');
define('AIO_BASIC_PAGE_FONT', 'aio_basic_page_font');
define('AIO_BASIC_PAGE_FONT_SIZE', 'aio_basic_page_font_size');
define('AIO_BASIC_PAGE_FONT_COLOR', 'aio_basic_page_font_color');

define('AIO_BASIC_BUTTON_BACKGROUND', 'aio_basic_button_background');
define('AIO_BASIC_BUTTON_COLOR', 'aio_basic_button_color');
define('AIO_BASIC_BLOCK_TITLE_FONT', 'aio_basic_block_title_font');
define('AIO_BASIC_BLOCK_TITLE_FONT_SIZE', 'aio_basic_block_title_font_size');
define('AIO_BASIC_BLOCK_TITLE_FONT_COLOR', 'aio_basic_block_title_font_color');
define('AIO_BASIC_PAGING_BACKGROUND', 'aio_basic_paging_background');
define('AIO_BASIC_PAGING_COLOR', 'aio_basic_paging_color');

define('AIO_HEADER_MENU_FONT', 'aio_header_menu_font');
define('AIO_HEADER_MENU_FONT_SIZE', 'aio_header_menu_font_size');
define('AIO_HEADER_MENU_FONT_COLOR', 'aio_header_menu_font_color');
define('AIO_HEADER_MENU_HOVER_FONT_COLOR', 'aio_header_menu_hover_font_color');
define('AIO_HEADER_HOTLINE_IS_DISPLAY', 'aio_header_hotline_is_display');
define('AIO_HEADER_HOTLINE_FONT', 'aio_header_hotline_font');
define('AIO_HEADER_HOTLINE_FONT_SIZE', 'aio_header_hotline_font_size');
define('AIO_HEADER_HOTLINE_FONT_COLOR', 'aio_header_hotline_font_color');
define('AIO_HEADER_HAVE_SEARCH', 'aio_header_have_search');
define('AIO_HEADER_HAVE_HOTLINE', 'aio_header_have_hotline');

define('AIO_SLIDESHOW_IS_DISPLAY_ALL_PAGE', 'aio_slideshow_is_display_all_page');
define('AIO_SLIDESHOW_TYPE', 'aio_slideshow_type');
define('AIO_SLIDESHOW_BACKGROUND', 'aio_slideshow_background');

define('AIO_PRODUCT_IS_ONLY1', 'aio_product_is_only1');
define('AIO_PRODUCT_NUM_COL', 'aio_product_num_col');
define('AIO_PRODUCT_NUM_PER_PAGE', 'aio_product_num_per_page');
define('AIO_PRODUCT_DISPLAY_TYPE', 'aio_product_display_type');
define('AIO_PRODUCT_BORDER', 'aio_product_border');
define('AIO_PRODUCT_BACKGROUND', 'aio_product_background');
define('AIO_PRODUCT_NUM_RELATED', 'aio_product_num_related');
define('AIO_PRODUCT_SALE_ICON', 'aio_product_sale_icon');

define('AIO_ARTICLE_NUM_PER_PAGE', 'aio_article_num_per_page');
define('AIO_ARTICLE_DISPLAY_TYPE', 'aio_article_display_type');
define('AIO_ARTICLE_BORDER', 'aio_article_border');
define('AIO_ARTICLE_BACKGROUND', 'aio_article_background');
define('AIO_ARTICLE_NUM_RELATED', 'aio_article_num_related');

define('AIO_PRODUCT_HOME_TYPE', 'aio_product_home_type');
define('AIO_PRODUCT_HOME_BORDER', 'aio_product_home_border');
define('AIO_PRODUCT_HOME_BACKGROUND', 'aio_product_home_background');

define('AIO_SIDEBAR_POSITION', 'aio_sidebar_position');
define('AIO_SIDEBAR_CATEGORY_BACKGROUND', 'aio_category_background');
define('AIO_SIDEBAR_CATEGORY_COLOR', 'aio_category_color');
define('AIO_SIDEBAR_CATEGORY_BORDER', 'aio_category_border');
define('AIO_SIDEBAR_PRODUCT_NUMBER', 'aio_sidebar_product_number');
define('AIO_SIDEBAR_PRODUCT_TYPE', 'aio_sidebar_product_type');
define('AIO_SIDEBAR_PRODUCT_BORDER', 'aio_sidebar_product_border');
define('AIO_SIDEBAR_CONTACT_BORDER', 'aio_sidebar_contact_boder');
define('AIO_SIDEBAR_CONTACT_BACKGROUND', 'aio_sidebar_contact_background');
define('AIO_SIDEBAR_IS_DISPLAY_FANPAGE', 'aio_is_display_fanpage');
define('AIO_SIDEBAR_IS_DISPLAY_CONTACT_INFO', 'aio_is_display_contact_info');

define('AIO_ORDER_FONT', 'aio_order_font');
define('AIO_ORDER_FONT_SIZE', 'aio_order_font_size');
define('AIO_ORDER_FONT_COLOR', 'aio_order_font_color');
define('AIO_ORDER_BACKGROUND', 'aio_order_background');
define('AIO_ORDER_BORDER', 'aio_order_border');

define('PATH_TO_IMAGE', get_template_directory_uri().'/images/');

define('NUM_CHAR_DES', 200);
define('NUM_PRODUCT_HOME', 12);

define('PID_ABOUT_US', 40);
define('PID_PRODUCT', 45);
define('PID_ARTICLE', 8);
define('PID_CONTACT', 97);
define('PID_ORDER', 109);
define('PID_CART', 103);

define('PID_STD_BENEFIT', 34);
define('PID_STD_PACKAGE', 15);
define('PID_MAIL_NEW_REGISTER', 96);
define('PID_MAIL_END_TRIAL', 77);
define('PID_MAIL_CLOSE_WEB', 82);


define("MAPKEY", "AIzaSyDJGpI5-Y1R6j-U1_MIxEH6prt2OZxQ1vE");

define('VID_PRODUCT_CATEGORY', 'product_category');

$fonts = array(
    'Georgia, serif' => '<div style="font-family=Georgia, serif;">Georgia</div>',
    '"Palatino Linotype", "Book Antiqua", Palatino, serif' => '<div style="font-family=;Palatino Linotype, Book Antiqua">Palatino Linotype</div>',
    '"Times New Roman", Times, serif'=> '<div style="font-family=Times New Roman, Times, serif;">Times New Roman</div>',
    'Arial, Helvetica, sans-serif' => '<div style="font-family=Arial, Helvetica, sans-serif;">Arial</div>',
    '"Arial Black", Gadget, sans-serif' => '<div style="font-family=Arial Black, Gadget, sans-serif;">Arial Black</div>',
    '"Comic Sans MS", cursive, sans-serif' => '<div style="font-family=Comic Sans MS, cursive, sans-serif;">Comic Sans MS</div>',
    'Impact, Charcoal, sans-serif' => '<div style="font-family=Impact, Charcoal, sans-serif;">Impact</div>',
    '"Lucida Sans Unicode", "Lucida Grande", sans-serif' => '<div style="font-family=Lucida Sans Unicode, Lucida Grande, sans-serif;">Lucida Sans Unicode</div>',
    'Tahoma, Geneva, sans-serif' => '<div style="font-family=Tahoma, Geneva, sans-serif;">Tahoma</div>',
    '"Trebuchet MS", Helvetica, sans-serif' => '<div style="font-family=Trebuchet MS, Helvetica, sans-serif;">Trebuchet MS</div>',
    'Verdana, Geneva, sans-serif' => '<div style="font-family=Verdana, Geneva, sans-serif;">Verdana</div>',
    '"Courier New", Courier, monospace' => '<div style="font-family=Courier New, Courier, monospace;">Courier New</div>',
    '"Lucida Console", Monaco, monospace' => '<div style="font-family=Lucida Console, Monaco, monospace;">Lucida Console</div>',    
);
define ('AIO_GENERAL_FONTS', json_encode($fonts));

$site = get_current_site();
//var_dump($site);die;
define('AIO_DOMAIN', $site->domain);