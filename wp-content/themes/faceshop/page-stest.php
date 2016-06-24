<?php
/*
  Template Name: Stest
 */
?>

<?php get_header(); 
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

?>

