<?php
/**
 * @package AIO
 */
/*
Plugin Name: Aio Core
Plugin URI: http://snh.vn/
Description: Used by millions, Akismet is quite possibly the best way in the world to <strong>protect your blog from comment and trackback spam</strong>. It keeps your site protected from spam even while you sleep. To get started: 1) Click the "Activate" link to the left of this description, 2) <a href="http://akismet.com/get/">Sign up for an Akismet API key</a>, and 3) Go to your Akismet configuration page, and save your API key.
Version: 3.1.3
Author: Automattic
Author URI: https://facebook.com/SherChicken
*/
require_once('const.php');
require_once('aio_lib.php');

// update a site is responsive: , other options in config
// update_blog_option($blog_id=4, AIO_IS_RESPONSIVE, 'no');

// delete a site
// aio_custom_delete_cloned_site($i);

function aio_add_metaboxes() {
    add_meta_box('aio_box_product_category', 'Nhóm sản phẩm', 'aio_box_product_category', 'product', 'side', 'high');    	
}
add_action( 'add_meta_boxes', 'aio_add_metaboxes' );

function aio_box_product_category(){
    global $post;	   
    $selected_term = wp_get_post_terms( $post->ID, VID_PRODUCT_CATEGORY );   	
    if(!empty($selected_term)){
        $selected_term = reset($selected_term);
    }
    $terms = get_terms(VID_PRODUCT_CATEGORY,  array('hide_empty'=>false, 'parent'=>0, 'order'=>'ASC'));   
    echo '<select name="product_category">';
    foreach($terms as $term){        
        $selected = ($term->term_id == $selected_term->term_id) ? 'selected':'';
        echo '<option '.$selected.' value="'.$term->term_id.'">'.$term->name.'</a>';  
        $children = get_terms(VID_PRODUCT_CATEGORY,  array('hide_empty'=>false, 'parent'=>$term->term_id, 'order'=>'ASC'));           
        foreach($children as $child){
            $selected = $child->term_id == $selected_term->term_id ? 'selected':'';
            echo '<option '.$selected.' value="'.$child->term_id.'"> - '.$child->name.'</a>';  
        }
    }
    echo '</select>';    
}


// Save the Metabox Data
function aio_save_product_meta($post_id, $post) {   
    // Is the user allowed to edit the post or page?
    if (!current_user_can('edit_post', $post->ID))
        return $post->ID;
    
    wp_set_post_terms($post->ID, array($_REQUEST['product_category']), 'product_category' );
    return; // return because no more fields to save
    //realy save
    $product_meta = array();
    
    //$product_meta['wpcf-product_category'] = $_REQUEST['product_category'];
    
    // Add values of $events_meta as custom fields
    foreach ($product_meta as $key => $value) { // Cycle through the $events_meta array!
        if ($post->post_type == 'revision')
            return; // Don't store custom data twice
        $value = implode(',', (array) $value); // If $value is an array, make it a CSV (unlikely)
        if (get_post_meta($post->ID, $key, false)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if (!$value)
            delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'aio_save_product_meta', 1, 2); // save the custom fields

// change text "Feature image"
//add_action('do_meta_boxes', 'replace_featured_image_box');  
function replace_featured_image_box()  
{  
    remove_meta_box( 'postimagediv', 'product', 'side' );  
    add_meta_box('postimagediv', __('Ảnh đại diện'), 'post_thumbnail_meta_box', 'product', 'side', 'low');  
    
    
   // remove_meta_box( 'postimagediv', 'page', 'side' );  
    //remove_meta_box( 'pageparentdiv', 'page', 'side' );  
    remove_meta_box( 'postdivrich', 'slide', 'normal' );  
    
}  


function aio_custom_delete_cloned_site($site_id) {
    $n = $site_id;
    global $wpdb;
	$wpdb->query('DROP TABLE aio_' . $n . '_cptch_whitelist');
	$wpdb->query('DROP TABLE aio_' . $n . '_mail_bank');
    $wpdb->query('DROP TABLE aio_' . $n . '_commentmeta');
    $wpdb->query('DROP TABLE aio_' . $n . '_comments');
    $wpdb->query('DROP TABLE aio_' . $n . '_links');
    $wpdb->query('DROP TABLE aio_' . $n . '_options');
    $wpdb->query('DROP TABLE aio_' . $n . '_postmeta');
    $wpdb->query('DROP TABLE aio_' . $n . '_posts');
    $wpdb->query('DROP TABLE aio_' . $n . '_terms');
    $wpdb->query('DROP TABLE aio_' . $n . '_term_relationships');
    $wpdb->query('DROP TABLE aio_' . $n . '_term_taxonomy');
	$wpdb->query('DROP TABLE aio_' . $n . '_mail_bank');
}





function aio_admin_menu() {
    add_menu_page( 'Tùy chỉnh', 'Tùy chỉnh', 'manage_options', 'aio_core/any.php', 'aio_display_customize' );  	
}
add_action( 'admin_menu', 'aio_admin_menu' );


function aio_display_customize() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
    $location =get_bloginfo('url').'/wp-admin/customize.php';
	wp_redirect($location);exit;
}
