<?php 

function aio_get_description($post){
    if(is_numeric($post)){
        $post = get_post($post);        
    }
    $des = get_post_meta($post->ID, 'wpcf-description', true);
    if(!empty($des)){
        return $des;
    }    
    if(strlen($post->post_content)<=NUM_CHAR_DES){
        return $post->post_content;
    }
    $pos = strpos($post->post_content, ' ', NUM_CHAR_DES);
    return substr($post->post_content, 0, $pos);    
}


function aio_get_thumbnail($postID, $width, $height){
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'thumbnail_size' );
    $url = $thumb['0'];     
    return aio_image_resize($url, $width, $height, TRUE);
}

function aio_display_money($value){
    if(!is_numeric($value)){
        return '';
    }
    if($value==0){
        return 'Liên hệ';
    }
    return number_format($value, 3, '.', '.').'₫';
}

function aio_display_price($postID){
    $price = get_post_meta($postID, 'wpcf-price', true);
    return aio_display_money($price);
}

function aio_display_button_order($postID){
    if(get_option(AIO_IS_CART, 'no')=='yes'){
        echo '<div class="button addToCart" pid="'.$postID.'">Thêm vào giỏ hàng</div>';
    }
}

function aio_display_message_no_cart(){
    echo 'Trang web này hiện không có chức năng giỏ hàng. Bạn có thể yêu cầu người quản trị trang nâng cấp tính năng này.';
}
function aio_display_edit_link($postID){
    if(is_user_logged_in()){
        echo '<div class="admin-edit"><a target="_blank" href="'.  get_edit_post_link($postID).'">Sửa nội dung này</a></div>';
    }
}


// ajax
function add_cart_ajax_request() {
    
    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {
        $pid = $_REQUEST['pid'];
        if(!is_numeric($pid)){
            return false;
        }
        $domain_url = $_SERVER['SERVER_NAME'];
	$cookie_domain = str_replace("www","",$domain_url);
	setcookie("cart_in_use","true",time()+21600,"/",$cookie_domain);  //useful to not serve cached page when using with a caching plugin
	$products = $_SESSION['aio_cart'];
	
 	if(!is_array($products)) {
            $products = array();            
        }
        $pid = $_REQUEST['pid'];
        $new = TRUE;
        foreach($products as &$item){
            if($item['pid'] == $pid){
                $new = FALSE;
                $item['quantity']++;
                break;
            }
        }
        if($new == TRUE){
            $temp = array('pid'=>$pid, 'quantity'=>1);
            array_push($products, $temp);
        }

	$_SESSION['aio_cart'] = $products;        
        echo count($products);
    }     
    die();
}
add_action( 'wp_ajax_add_cart_ajax_request', 'add_cart_ajax_request' );
add_action( 'wp_ajax_nopriv_add_cart_ajax_request', 'add_cart_ajax_request' );

function remove_item_from_cart(){
    if ( isset($_REQUEST) ) {
        $pid = $_REQUEST['pid'];
        if(!is_numeric($pid)){
            echo -1;
            die;
        }
        $products = $_SESSION['aio_cart'];
        if(!is_array($products)) { $products = array();}

        foreach($products as $key => $item) {
            if( $item['pid'] == $pid){
                unset($products[$key]);
                sort($products);
                $_SESSION['aio_cart'] = $products;        
                echo 1;
                die;
            }
        }        
    }
    die;    
}
add_action( 'wp_ajax_remove_item_from_cart', 'remove_item_from_cart' );
add_action( 'wp_ajax_nopriv_remove_item_from_cart', 'remove_item_from_cart' );


function update_quantity(){
    if ( isset($_REQUEST) ) {
        $pid = $_REQUEST['pid'];
        if(!is_numeric($pid)){
            echo -1;
            die;
        }
        $quantity = $_REQUEST['quantity'];
        if(!is_numeric($quantity) || $quantity<1){
            echo -1;
            die;
        }
        $price = get_post_meta($pid, 'wpcf-price', true);
        if(is_numeric($price) && is_numeric($quantity)){
            // valid
            $products = $_SESSION['aio_cart'];
            $new = TRUE;

            if(!is_array($products)) { 
                $products = array();                
            }

            $total = 0;
            foreach($products as $key => $item) {
                $p_price = get_post_meta($item['pid'], 'wpcf-price', true);                
                    if( $item['pid'] == $pid){
                        $item['quantity'] = $quantity; 
                        unset($products[$key]);
                        array_push($products, $item);
                        $new = FALSE;
                    }
                $total += $p_price * $item['quantity'];    
            }
            sort($products);
            $_SESSION['aio_cart'] = $products;                
            $Xprice = $price*$quantity; 
            $result = array('str_price'=>  aio_display_money($Xprice), 'total'=>  'Tổng: '.aio_display_money($total));
            echo json_encode($result);
        }else{
            echo -1;
        }
    }
    die;    
}
add_action( 'wp_ajax_update_quantity', 'update_quantity' );
add_action( 'wp_ajax_nopriv_update_quantity', 'update_quantity' );


function aio_get_my_own_site(){
	if(is_user_logged_in()){
		$uid = get_current_user_id();
		$blogs = get_blogs_of_user($uid);
		return $blogs;	
	}
	return array();
}

function aio_send_mail_new_register($email, $name, $domain, $username, $password){
    $headers = "From: $sender\n";
    $headers .= "Content-Type: text/html\n";
    $headers .= $additional_headers . "\n";
    $body = apply_filters('the_content', get_post_field('post_content', 96));
    $body = str_replace('$name', $name, $body);
    $body = str_replace('$domain', $domain, $body);
    $body = str_replace('$username', $username, $body);
    $body = str_replace('$password', $password, $body);
    $sent = wp_mail($admin_email, get_the_title(PID_MAIL_END_TRIAL), $body, $headers, $attachments=null );					
}
