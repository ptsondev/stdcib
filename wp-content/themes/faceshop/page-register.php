<?php
/*
  Template Name: Page Register
 */
?>

<?php get_header(); ?>

<?php

//aio_custom_delete_cloned_site(39);

$email = '';

    // process clone website
	$domain = '';
	$title = '';
	$email = '';
	$isCustomize = 'yes';
	$isCart = 'yes';
	$isResponsive = 'yes';
	
    if(isset($_REQUEST['btnRegister'])){
		require_once(get_template_directory().'/../../plugins/multisite-clone-duplicator/lib/duplicate.php');
        //1. validate domain
        $domain = strip_tags($_REQUEST['txtSiteDomain']);        
        $title = strip_tags($_REQUEST['txtSiteName']);
        $email = strtolower(strip_tags($_REQUEST['txtSiteEmail']));
        $isCustomize = $_REQUEST['cbxSiteCustomize']=='yes'?'yes':'no';
        $isCart = $_REQUEST['cbxSiteCart']=='yes'?'yes':'no';
        $isResponsive = $_REQUEST['cbxSiteResponsive']=='yes'?'yes':'no';
        
        $current_site = get_current_site();
        $errors = array();
        $regex='/^\w+$/';
        
        if($domain==''){
            $error['#feature-site-domain'] = 'Domain không được để trống';
        }else if(!preg_match($regex, $domain)){
            $error['#feature-site-domain'] = 'Domain không được chứa các ký tự đặc biệt';
        }
        if(strlen($domain)>50){
            $error['#feature-site-domain'] = 'Domain dài tối đa 50 ký tự';
        }
        if ( domain_exists($newdomain, '/', $current_site->id) ){
            $error['#feature-site-domain'] = 'Domain đã được đăng ký, vui lòng chọn domain khác.';
        }
        if(strlen($title)>128){
            $error['#feature-site-title'] = 'Tiêu đề dài tối đa 128 ký tự';
        }
        if(!is_email($email)){
            $error['#feature-site-email'] = 'Địa chỉ email không hợp lệ';
        }
		if ( ( function_exists( 'cptch_check_custom_form' ) && cptch_check_custom_form() !== true ) || ( function_exists( 'cptchpr_check_custom_form' ) && cptchpr_check_custom_form() !== true ) ){
			$error['#feature-captcha'] = 'Vui lòng nhập lại captcha';
		}		
        if(!empty($error)){
            $str_error = '';
            $id_error = '';
            foreach ($error as $k => $v){
                $str_error.= '<li>'.$v.'</li>';
                $id_error.= $k.', ';
            }      
            $id_error = substr($id_error, 0, strlen($id_error)-2);
        }else{

            //2. duplicate
            $domain = strtolower($domain);
            $newdomain = $domain.'.'.AIO_DOMAIN;
            $data = array(
                'source' => 4,
                'from_site_id' => 4,
                'domain' => $domain,
                'newdomain' => $newdomain,
                'title' => $title,
                'email' => $email,
                //custom
                AIO_IS_RESPONSIVE => $isResponsive,      
                AIO_IS_CUSTOMIZE => $isCustomize,
                AIO_IS_CART => $isCart,
                'is_menu_editable' => 'no',

                //init
                'copy_files' => 'yes',
                'keep_users' => 'yes',
                'log' => 'no',
                'log-path' => '',
                'advanced' => 'hide-advanced-options',            
                'path'=> '/',
                'public'=>true,
                'network_id' =>1
            );
            $msg= MUCD_Duplicate::duplicate_site($data);  			
        }
    }
	$checkResponsive = $isResponsive=='yes'?'checked="checked"':'';
	$checkCustomize = $isCustomize=='yes'?'checked="checked"':'';
	$checkCart = $isCart=='yes'?'checked="checked"':'';
	
?>


<main>

    <div class="main-wrapper container">	
        <?php while (have_posts()) : the_post(); ?>
        <h1 class="moveL active">ĐĂNG KÝ WEBSITE</h1>
        <?php echo get_template_part('breadcrumb'); ?>
        <div class="row">
            <div id="main-content" class="col-sm-8 col-xs-12">
			<?php 
				$id = get_the_ID();    
				aio_display_edit_link($id);
				?>
				
                <div class="block">
                    <p>Với gói website cơ bản, bạn đã có thể đăng tải nội dung sản phẩm của mình. Ngoài ra bạn có thể đăng ký thêm các option mở rộng cho phù hợp với quy mô của shop. Các option này cũng có thể nâng cấp sau này bất cứ khi nào bạn cần.</p>
					<p>Đăng ký dùng thử 2 tuần miễn phí ngay. Xem clip <a href="http://cibweb.com/tutorial/huong-dan-dang-ky-website-tai-cibweb/" title="Hướng dẫn đăng ký website tại CIBWEB" alt="Hướng dẫn đăng ký website tại CIBWEB"> Hướng dẫn đăng ký website tại CIBWEB</a></p>
                    <form id="frm-register-site" method="post">
                    <?php
                        if ($str_error) {
                            echo '<div id="re-error">' . $str_error . '</div>';
                        }else if($email!=''){
							echo '<div class="messages">Đã khỏi tạo website thành công. Vui lòng kiểm tra email: '.$email.'</div>';
						}
						
                        ?>
                        <h3><strong>Tùy chọn options</strong></h3>
						<!--<div id="feature-site-init" class="feature"><input type="checkbox" name="cbxSiteInit" disabled="disabled" checked="checked" /> Khởi tạo 200.000vnd</div>-->
                        <div id="feature-site-basic" class="feature"><input type="checkbox" name="cbxSiteBasic" disabled="disabled" checked="checked" /> Cơ bản (100.000vnd/tháng)</div>
                        <div id="feature-site-customize" class="feature"><input type="checkbox" name="cbxSiteCustomize" value="yes" <?php echo $checkCustomize ?> /> Tùy chỉnh giao diện +50.000vnd/tháng</div>
                        <div id="feature-site-cart" class="feature"><input type="checkbox" name="cbxSiteCart" value="yes" <?php echo $checkCart ?> /> Có chức năng giỏ hàng +50.000vnd/tháng</div>
                        <div id="feature-site-responsive" class="feature"><input type="checkbox" name="cbxSiteResponsive" value="yes" <?php echo $checkResponsive ?> /> Responsive +50.000vnd/tháng</div>
                        <h3><strong>Thông tin shop</strong></h3>
                        <div id="feature-site-domain" class="feature"><label>Sub domain</label><input name="txtSiteDomain" type="text" value="<?php echo $domain; ?>" title="Tên miền phụ cho website của bạn"> .cibweb.net</div>
						<div id="feature-site-name" class="feature"><label>Tên shop</label><input name="txtSiteName" type="text" value="<?php echo $title; ?>" title="Làm nên thương hiệu của bạn"></div>
						<div id="feature-site-email" class="feature"><label>Email admin</label><input name="txtSiteEmail" type="text" value="<?php echo $email; ?>" title="Bạn sẽ nhận được thông tin đăng nhập qua email này"></div>
						<div id="feature-captcha" class="feature"><label>Captcha</label>
						<?php 
						if( function_exists( 'cptch_display_captcha_custom' ) ) {
							echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; 
							echo cptch_display_captcha_custom() ;
						};
						if( function_exists( 'cptchpr_display_captcha_custom' ) ) {
							echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />";
							echo cptchpr_display_captcha_custom() ;
						};
						?>
						</div>
						
                        <div><input name="btnRegister" value="Đăng ký" type="submit" class="button" ></div>
                        <script>
                            jQuery(document).ready(function($) {
                                $('<?php echo $id_error; ?>').addClass('error');
                            });
                        </script>
                    </form>
                </div>
            </div>

            <div id="sidebar" class="col-sm-4 col-xs-12">
                 <?php get_sidebar(); ?>
            </div>
        </div>
        <?php endwhile; // end of the loop. ?>   
    </div>
</main>

<?php get_footer(); ?>

	
