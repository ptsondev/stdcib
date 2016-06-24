<?php
/**
 * Our custom dashboard page
 */

/** WordPress Administration Bootstrap */
require_once( ABSPATH . 'wp-load.php' );
require_once( ABSPATH . 'wp-admin/admin.php' );
require_once( ABSPATH . 'wp-admin/admin-header.php' );
?>
<div class="wrap about-wrap">
	<h1>Quản trị website "<?php echo get_bloginfo();?>"</h1>
	<?php $url = get_bloginfo('url'); ?>
	
	<div class="about-text">
		Chào mừng bạn trở lại hệ thống quản trị website của CIBWEB, chúng tôi luôn hỗ trợ bạn hết mình trong việc quản trị và phát triển website.
	</div>
	<hr />
	<h2>Tùy chỉnh giao diện</h2> 
	<a href="<?php echo $url?>/wp-admin/customize.php">Link tùy chỉnh giao diện</a> - <a target="_blank" href="http://cibweb.com/tutorial/huong-dan-tuy-chinh-giao-dien-cibweb/">Xem hướng dẫn</a>
	<p>Cá nhân hóa website của bạn, biến chúng trở nên riêng biệt theo phong cách mà bạn muốn. Việc tùy chỉnh website giờ đây trở nên dễ dàng và trực quan hơn bao giờ hết. </p>	
	<?php 
	$more = '';
	if(get_option(AIO_IS_CUSTOMIZE, 'no')=='no'){
		$more = 'Bạn có thể <a href="">nâng cấp</a> chức năng này cho website hiện tại chỉ với vài cú click chuột và chi phí vô cùng tốt: chỉ + thêm 100.000VND/tháng.';
	}?>
	<p>Tip: Với gói website có tích hợp chức năng tùy chỉnh nâng cao, bạn có thể tùy chỉnh toàn bộ từ màu sắc, font chữ, đến cách hiển thị các đối tượng: slideshow, sản phẩm,...<?php echo $more;?></p>
	
	<hr />
	<h2>Slideshow</h2> 
	<a href="<?php echo $url?>/wp-admin/edit.php?post_type=slide">Link tùy chỉnh slideshow</a> - <a target="_blank" href="http://cibweb.com/tutorial/huong-dan-tuy-chinh-slide-hinh-anh/">Xem hướng dẫn</a>
	<p>Thêm/xóa/sửa các slideshow ở đầu trang chủ. Tip: Hãy đưa những hình ảnh nổi bật nhất của bạn lên slideshow nhằm tạo sự thu hút khách hàng.</p>	
	
	<hr />
	<h2>Quản lý sản phẩm</h2> 
	<a href="<?php echo $url?>/wp-admin/edit.php?post_type=product">Link quản lý sản phẩm</a> - <a target="_blank" href="http://cibweb.com/tutorial/huong-dan-them-san-pham-moi/">Xem hướng dẫn</a>
	<p>Thêm/xóa/sửa các sản phẩm của bạn. Tip: Hãy ghi đầy đủ thông tin của từng sản phẩm để khách hàng hiểu rõ và tương tác nhiều hơn. Ngoài ra nên chọn hình đại diện là những hình có kích thước vuông</p>	
	
	<hr />
	<h2>Quản lý bài viết</h2> 
	<a href="<?php echo $url?>/wp-admin/edit.php?post_type=article">Link quản lý bài viết</a>
	<p>Thêm/xóa/sửa các bài viết cho website. Bài viết ngoài việc bổ xung thông tin liên quan đến sản phẩm, chúng còn có tác dụng rất hữu ích cho việc SEO top google.</p>
	<p>Tip: Điền đầy đủ phần tóm tắt bài viết để đạt hiệu quả SEO cao nhất.</p>	

</div>
