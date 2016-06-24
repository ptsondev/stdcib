<?php
$u = wp_get_current_user();

// load fonts and style
function load_fonts_style() {
    if (get_option(AIO_IS_RESPONSIVE, 'no')=='yes') {
        wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0', 'all');
        wp_enqueue_style('bootstrap');
    }
    wp_register_style('pgwslideshow.min', get_template_directory_uri() . '/css/pgwslideshow.min.css', array(), '1.0', 'all');
    wp_enqueue_style('pgwslideshow.min');
    
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('main');

    if (get_option(AIO_IS_RESPONSIVE, 'no')=='yes') {
        wp_register_style('update_responsive', get_template_directory_uri() . '/css/update_responsive.css', array(), '1.0', 'all');
        wp_enqueue_style('update_responsive');
    }
}

add_action('wp_print_styles', 'load_fonts_style');
// load scripts
function load_scripts() {
    if (get_option(AIO_IS_RESPONSIVE, 'no')=='yes') {
        wp_register_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array());
        wp_enqueue_script('bootstrap.min');
    }

    wp_register_script('jquery.min', get_template_directory_uri() . '/js/jquery.min.js', array());
    wp_enqueue_script('jquery.min');

    wp_register_script('jquery.mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js', array());
    wp_enqueue_script('jquery.mousewheel');

    wp_register_script('jquery.autopager', get_template_directory_uri() . '/js/jquery.autopager-1.0.0.js', array());
    wp_enqueue_script('jquery.autopager');
    
    wp_register_script('pgwslideshow.min', get_template_directory_uri() . '/js/pgwslideshow.min.js', array());
    wp_enqueue_script('pgwslideshow.min');
    
    wp_register_script('responsiveslides.min', get_template_directory_uri() . '/js/responsiveslides.min.js', array());
    wp_enqueue_script('responsiveslides.min');

    wp_register_script('js', get_template_directory_uri() . '/js/js.js', array());
    wp_enqueue_script('js');

    wp_localize_script('js', 'ajaxurl', admin_url( 'admin-ajax.php'));
}

add_action('wp_enqueue_scripts', 'load_scripts');


function snh_social_share() {
    $share = '<div id="custom_share">';
    $share .= "<script type='text/javascript'>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a class='share_facebook' title='Share to Facebook' href='http://www.facebook.com/share.php?u=<url>' onclick='return fbs_click()' target='_blank' ><div class='share facebook'></div></a>";
    $share .= '<a class="share_twitter" href="http://twitter.com/home?status=Currentlyreading" title="Share to Twitter"><div class="share twitter"></div></a>';
    $share .= '<a class="share_linkhay" title="Share to Linkhay" href="http://linkhay.com/submit"><div class="share linkhay"></div></a>';
    $share .= '<a title="Share to Zing" class="share_zing" name="zm_share" type="text"><div class="share zing"></div></a><script src="http://wb.me.zing.vn/index.php?wb=LINK&t=js&c=share_button" type="text/javascript"></script>';
    $share .= '<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{lang: \'vi\'}</script><g:plusone size="medium"></g:plusone>';
    $share .= '<div class="fb-like" data-send="false" data-layout="button_count" data-show-faces="false"></div>';
    $share.='</div>';
    return $share;
}

if($u->ID!=1){
	add_action('admin_menu', 'snh_remove_menu_pages', 9999);
	add_action('admin_head', 'aio_custom_admin_css', 9999);
}
function snh_remove_menu_pages() {  
    remove_menu_page('index.php');
    remove_menu_page('options-general.php');
    remove_menu_page('edit.php');
    remove_menu_page('edit.php?post_type=page');
    remove_menu_page('admin.php?page=wpcf7');
    remove_menu_page('admin.php?page=wpcf-ctt');
    remove_menu_page('themes.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('upload.php');
    remove_menu_page('admin.php');
    remove_menu_page('admin.php?page=wpcf-cf');
	remove_menu_page('admin.php?page=smtp_mail');	
    remove_menu_page('plugins.php');
    remove_menu_page('users.php');
    remove_menu_page('tools.php');
	remove_menu_page('admin.php?page=bws_plugins');
}
function aio_custom_admin_css(){	
?>
	<style>
		#toplevel_page_wpcf,
		#toplevel_page_smtp_mail,        
        #wpadminbar #wp-admin-bar-wp-logo,
        #wpadminbar #wp-admin-bar-my-sites,
        #wpadminbar #wp-admin-bar-comments,
        #wpadminbar #wp-admin-bar-new-content,
        #wpadminbar #wp-admin-bar-view,
        #wpadminbar #wp-admin-bar-mail_bank,
		#toplevel_page_wpcf7, 
		#your-profile .form-table:first-child, 
		#toplevel_page_bws_plugins, 
		#menu-appearance, 
        #wpcf-marketing{
			display:none!important;
			margin:0;
			padding:0;
		}
        
		#adminmenu li.wp-menu-separator {
			height:0!important;margin:0!important
		}
	</style>
<?php 
}


// Admin footer modification
function remove_footer_admin () 
{
    echo '<span id="footer-thankyou">Developed by <a href="http://cibweb.com" target="_blank">CIBWEB</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// resize image by url
require_once(get_template_directory().'/libs/aio_image_resize.php');


// Add more customize 
require_once(get_template_directory().'/customize/basic.php');
require_once(get_template_directory().'/customize/contact.php');
require_once(get_template_directory().'/customize/socials.php');

if(get_option(AIO_IS_CUSTOMIZE, 'no')=='yes'){
    require_once(get_template_directory().'/customize/header.php');
    require_once(get_template_directory().'/customize/slideshow.php');
    require_once(get_template_directory().'/customize/sidebar.php');     
    require_once(get_template_directory().'/customize/product.php');
    require_once(get_template_directory().'/customize/article.php');
    require_once(get_template_directory().'/customize/order.php');
}

function my_theme_customizer_css(){
    ?>
    <style>
    #home-slider{
        background:<?php echo get_theme_mod(AIO_SLIDESHOW_BACKGROUND, '#F5F4F4') ?>;    
    }    
    #product-category li{
        background:<?php echo get_theme_mod(AIO_SIDEBAR_CATEGORY_BACKGROUND, '#ff00ff') ?>;    
    }  
    #product-category li a{
        color:<?php echo get_theme_mod(AIO_SIDEBAR_CATEGORY_COLOR, '#ff00ff') ?>;    
    }  
    #block-contact .border{
        background:<?php echo get_theme_mod(AIO_SIDEBAR_CONTACT_BACKGROUND, '#ffffff') ?>;    
    }  
    body{
        background:<?php echo get_theme_mod(AIO_BASIC_PAGE_BACKGROUND, '#ffffff') ?>;    
        font-family:<?php echo get_theme_mod(AIO_BASIC_PAGE_FONT, 'Arial') ?>;    
        font-size:<?php echo get_theme_mod(AIO_BASIC_PAGE_FONT_SIZE, '13') ?>;    
        color:<?php echo get_theme_mod(AIO_BASIC_PAGE_FONT_COLOR, '#000') ?>;    
    }  
    .button, .wpcf7-submit{
        background:<?php echo get_theme_mod(AIO_BASIC_BUTTON_BACKGROUND, '#96C346') ?>;    
        color:<?php echo get_theme_mod(AIO_BASIC_BUTTON_COLOR, '#ffffff') ?>;    
    }
    h2.block-title{
        font-family:<?php echo get_theme_mod(AIO_BASIC_BLOCK_TITLE_FONT, 'Arial') ?>;    
        font-size:<?php echo get_theme_mod(AIO_BASIC_BLOCK_TITLE_FONT_SIZE, 20) ?>;    
        color:<?php echo get_theme_mod(AIO_BASIC_BLOCK_TITLE_FONT_COLOR, 'orange') ?>;    
    }
    #main-menu li a{
        font-family:<?php echo get_theme_mod(AIO_HEADER_MENU_FONT, 'Arial') ?>;    
        font-size:<?php echo get_theme_mod(AIO_HEADER_MENU_FONT_SIZE, 20) ?>;    
        color:<?php echo get_theme_mod(AIO_HEADER_MENU_FONT_COLOR, 'orange') ?>;    
    }
    #main-menu li.current-menu-item a,
    #main-menu li a:hover{
        color:<?php echo get_theme_mod(AIO_HEADER_MENU_HOVER_FONT_COLOR, 'orange') ?>;    
    }
    #hotline{
        font-family:<?php echo get_theme_mod(AIO_HEADER_HOTLINE_FONT, 'Arial') ?>;    
        font-size:<?php echo get_theme_mod(AIO_HEADER_HOTLINE_FONT_SIZE, 20) ?>;    
        color:<?php echo get_theme_mod(AIO_HEADER_HOTLINE_FONT_COLOR, 'orange') ?>;    
    }
    .list-product .sub-item{
        background:<?php echo get_theme_mod(AIO_PRODUCT_BACKGROUND, '#ffffff') ?>;
    }    
    #main-content{
        float:<?php echo get_theme_mod(AIO_SIDEBAR_POSITION, 'right') ?>;
    }
    .list-article .item{
        background:<?php echo get_theme_mod(AIO_ARTICLE_BACKGROUND, '#ffffff') ?>;
    }
    #page-paginate a{
        background:<?php echo get_theme_mod(AIO_BASIC_PAGING_BACKGROUND, 'white') ?>;
        color:<?php echo get_theme_mod(AIO_BASIC_PAGING_COLOR, 'green') ?>;
    }
    .list-product .item .sale{
        background-image:url('<?php echo get_theme_mod(AIO_PRODUCT_SALE_ICON, '../images/sale.png');?>');
    }
    
    #shop-rule{
        background:<?php echo get_theme_mod(AIO_ORDER_BACKGROUND, '#eee') ?>;
        color:<?php echo get_theme_mod(AIO_ORDER_FONT_COLOR, '#000') ?>;
        font-family:<?php echo get_theme_mod(AIO_ORDER_FONT, 'Arial') ?>;    
        font-size:<?php echo get_theme_mod(AIO_ORDER_FONT_SIZE, 16) ?>;            
    }
    </style>
    <?php 
}
add_action( 'wp_head', 'my_theme_customizer_css' );


// live preview
function aio_customize_register($wp_customize) {
    if ($wp_customize->is_preview() && !is_admin()) {
        add_action('wp_footer', 'aio_customize_preview', 21);
    }
} 
add_action( 'customize_register', 'aio_customize_register');

function aio_customize_preview() {
    ?>
    <script>
    (function( $ ){
        wp.customize('aio_basic_page_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#fff';
                $('body').css('background', final_value);
            });
        });
        wp.customize('aio_basic_page_font_color', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#000';
                $('body').css('color', final_value);
            });
        });   
        
        wp.customize('aio_category_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#e83a34';
                $('#product-category li').css('background', final_value);
            });
        });
        
        wp.customize('aio_category_color', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#e83a34';
                $('#product-category li a').css('color', final_value);
            });
        });
        
        wp.customize('aio_sidebar_contact_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#ffffff';
                $('#block-contact .border').css('background', final_value);
            });
        });
        
        wp.customize('aio_slideshow_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#F5F4F4';
                $('#home-slider').css('background', final_value);
            });
        });
        
        wp.customize('aio_slideshow_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#F5F4F4';
                $('#home-slider').css('background', final_value);
            });
        });
        
        wp.customize('aio_article_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#ffffff';
                $('.list-article .item').css('background', final_value);
            });
        });
        
        wp.customize('aio_basic_button_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#ffffff';
                $('.button, .wpcf7-submit').css('background', final_value);
            });
        });
        
        wp.customize('aio_basic_button_color', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#ffffff';
                $('.button').css('color', final_value);
            });
        });
        
        wp.customize('aio_basic_block_title_font', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'Arial';
                $('h2.block-title').css('font-family', final_value);
            });
        });        
        wp.customize('aio_basic_block_title_font_size', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '20px';
                $('h2.block-title').css('font-size', final_value);
            });
        });        
        wp.customize('aio_basic_block_title_font_color', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'orange';
                $('h2.block-title').css('color', final_value);
            });
        });
        
        wp.customize('aio_header_menu_font', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'Arial';
                $('#main-menu li a').css('font-family', final_value);
            });
        });        
        wp.customize('aio_header_menu_font_size', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '20px';
                $('#main-menu li a').css('font-size', final_value);
            });
        });        
        wp.customize('aio_header_menu_font_color', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'orange';
                $('#main-menu li a').css('color', final_value);
            });
        });
        wp.customize('aio_header_menu_hover_font_color', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'orange';
                $('#main-menu li.current-menu-item a, #main-menu li a:hover').css('color', final_value);
            });
        });
        
        wp.customize('aio_header_hotline_font', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'Arial';
                $('#hotline').css('font-family', final_value);
            });
        });        
        wp.customize('aio_header_hotline_font_size', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '20px';
                $('#hotline').css('font-size', final_value);
            });
        });        
        wp.customize('aio_header_hotline_font_color', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'orange';
                $('#hotline').css('color', final_value);
            });
        });
        
        wp.customize('aio_product_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'white';
                $('.list-product .sub-item').css('background', final_value);
            });
        });
        
        wp.customize('aio_sidebar_position', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'right';
                $('#main-content').css('float', final_value);
            });
        });
        
        wp.customize('aio_basic_paging_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'white';
                $('#page-paginate a').css('background', final_value);
            });
        });
        wp.customize('aio_basic_paging_color', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'green';
                $('#page-paginate a').css('color', final_value);
            });
        });
        
        wp.customize('aio_product_sale_icon', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'green';
                $('.list-product .item .sale').css('background-image', 'url("'+final_value+'")');
            });
        });        
        
        wp.customize('aio_order_background', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#eee';
                $('#shop-rule').css('background', final_value);
            });
        }); 
        wp.customize('aio_order_font', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 'Arial';
                $('#shop-rule').css('font-family', final_value);
            });
        });
        wp.customize('aio_order_font_size', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : 16;
                $('#shop-rule').css('font-size', final_value);
            });
        });
        wp.customize('aio_order_font_color', function(value) {
            value.bind(function(final_value) {
                final_value = final_value ? final_value : '#000';
                $('#shop-rule').css('color', final_value);
            });
        });
       
    })(jQuery);
    </script>
    <?php 
    
}

add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}

add_filter( 'login_redirect', create_function( '$url,$query,$user', 'return get_admin_url(0, "edit.php?post_type=product");' ), 10, 3 );

if($u->ID!=1){
	add_action( 'admin_bar_menu', 'aio_modify_admin_bar' );
}
function aio_modify_admin_bar( &$wp_admin_bar ){
	$wp_admin_bar->remove_node( 'user-actions' );
	$wp_admin_bar->remove_node( 'user-info' );
	$wp_admin_bar->remove_node( 'edit-profile' );
	$wp_admin_bar->remove_node( 'my-account' );	
	
	$blogs = aio_get_my_own_site();
	if(!empty($blogs)){
		foreach($blogs as $blog){
			$node = array(
				'id' => $blog->domain,
				'title' => 'Trang '.$blog->blogname,
				'href' => $blog->siteurl
			);
			$wp_admin_bar->add_node( $node);
			
			$node = array(
				'id' => $blog->domain.'-admin',
				'title' => 'Quản lý '.$blog->blogname,
				'href' => $blog->siteurl.'/wp-admin/'
			);
			$wp_admin_bar->add_node( $node);
		}
	}
	
		
	$node = array(
		'id' => 'clogout',
		'title' => 'Đăng Xuất',
		'href' => wp_logout_url()
	);
	$wp_admin_bar->add_node( $node);  
}

add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start(); // flush het moi redirect duoc
}

function aio_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/../faceshop/images/logo.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'aio_login_logo' );


register_activation_hook(__FILE__, 'my_activation');
add_action('aio_daily_event', 'mail_end_trial_site');

function my_activation() {
	wp_schedule_event(time(), 'daily', 'aio_daily_event');
}

function mail_end_trial_site() {
	global $wpdb;

	$args = array(
		'network_id' => $wpdb->siteid,
		'public'     => null,
		'archived'   => null,
		'mature'     => null,
		'spam'       => null,
		'deleted'    => 0,
		'limit'      => 100,		
		'offset'     => 0
	);

	$sites = wp_get_sites( $args ); 
	$trial_time = 86400 * 15; // 15 days
	$monthly = 86400*30;	  // 30 days
	$monthly_3 = 86400*33;	  // 33 days

	$now = time();

	$headers = "From: $sender\n";
	$headers .= "Content-Type: text/html\n";
	$headers .= $additional_headers . "\n";

				
	foreach($sites as $site){
		$registered = strtotime($site['registered']);
		$last_payment = strtotime($site['last_payment']);	
		
		$arr_admin_blog_id = array(1, 4, 60);
		if(!in_array($site['blog_id'], $arr_admin_blog_id)){
			if($last_payment < 0){ // new register
				if($now - $registered > $trial_time){	// end trial_time: hết hạn dùng thử
					$ex = $now - $registered - $trial_time;	// thời gian đã lố
					$day = 3;
					if($ex > 86400 * 2){
						$day = 1;
					}else if($ex > 86400){
						$day = 2;
					}
					
					$body = apply_filters('the_content', get_post_field('post_content', PID_MAIL_END_TRIAL));
					$body = str_replace('$website', $site['domain'], $body);
					$body = str_replace('$day', $day, $body);
					$admin_email = get_blog_option( $site['blog_id'], 'admin_email');			
					$sent = wp_mail($admin_email, get_the_title(PID_MAIL_END_TRIAL), $body, $headers, $attachments=null );					
				}
			}else{	// already pay sometime
				if($now - $last_payment > $monthly_3){		// hết 33 ngày, đóng luôn
				
					$wpdb->update( 
						'aio_blogs', 
						array( 
							'deleted' => 1
						), 
						array( 'blog_id' => $site['blog_id'] )
					);		
				
					$body = apply_filters('the_content', get_post_field('post_content', PID_MAIL_CLOSE_WEB));
					$body = str_replace('$website', $site['domain'], $body);
					
					$admin_email = get_blog_option( $site['blog_id'], 'admin_email');			
					$sent = wp_mail($admin_email, get_the_title(PID_MAIL_CLOSE_WEB), $body, $headers, $attachments=null );
				}else if($now - $last_payment > $monthly){	// hết 1 tháng
					$ex = $now - $last_payment - $monthly;	// thời gian đã lố
					$day = 3;
					if($ex > 86400 * 2){
						$day = 1;
					}else if($ex > 86400){
						$day = 2;
					}
					$body = apply_filters('the_content', get_post_field('post_content', PID_MAIL_END_TRIAL));
					$body = str_replace('$website', $site['domain'], $body);
					$body = str_replace('$day', $day, $body);
					
					$admin_email = get_blog_option( $site['blog_id'], 'admin_email');			
					$sent = wp_mail($admin_email, get_the_title(PID_MAIL_END_TRIAL), $body, $headers, $attachments=null );	
				}
			}
		}
	}
}