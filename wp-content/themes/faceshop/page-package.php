<?php
/*
  Template Name: STD Package
 */
?>
<?php get_header(); ?>
<main>
    <div class="main-wrapper container">	
        <?php while (have_posts()) : the_post(); ?>
        <h1 class="moveL active">Các gói website</h1>
        <?php echo get_template_part('breadcrumb'); ?>
        <div class="row">
            <div id="main-content">
			<?php 
				$id = get_the_ID();    
				aio_display_edit_link($id);
				?>
               <div class="package package-1 col-sm-6 col-xs-12">
			<div class="block sub-package">
				<h3><strong>Gói cơ bản</strong></h3>
				<div class="package-content">
					<li>Phù hợp với các shop online vừa và nhỏ</li>
					<li>Triển khai nhanh, chỉ mất tối đa 3-5 phút.</li>
					<li>Được dùng thử miễn phí 2 tuần. Đăng ký ngay tại <a href="">đây</a></li>
					<li>Hỗ trợ liên kết tên miền chính</li>
					<li>Chi phí khởi tạo: 300.000vnd</li>
					<li>Chi phí duy trì: 200.000vnd/tháng</li>
					<li><strong>Các option thêm:</strong></li>
					<li class="dep2">Tích hợp responsive: thêm 100k/tháng. Xem <a href="">responsive là gì?</a></li>
					<li class="dep2">Cho phép tùy chỉnh giao diện: thêm 100.000vnd/tháng. Xem <a href="http://cibweb.com/tutorial/huong-dan-tuy-chinh-giao-dien-cibweb/">demo</a></li>
					<li class="dep2">Tích hợp chức năng giỏ hàng: thêm 100.000vnd/tháng</li>				
				</div>
			</div>
			</div>
			
			<div class="package package-2 col-sm-6 col-xs-12">
			<div class="block sub-package">
				<h3><strong>Gói nâng cao</strong></h3>
				<div class="package-content">
					<li>Phù hợp với những doanh nghiệp lớn, thương hiệu uy tín</li>
					<li>Mở rộng tính năng và thay đổi giao diện <strong>hoàn toàn theo yêu cầu</strong></li>
					<li>Thời gian triển khai: 3-5 tuần</li>		
					<li>Triển khai qua nhiều giai đoạn: </li>
					<li class="dep2">Ký hợp đồng</li>
					<li class="dep2">Lấy yêu cầu</li>
					<li class="dep2">Thiết kế giao diện</li>
					<li class="dep2">Lập trình chức năng</li>
					<li class="dep2">Chạy thử - điều chỉnh</li>
					<li class="dep2">Bàn giao & thanh lý hợp đồng</li>		
				</div>				
			</div>
			</div>
            </div>           
        </div>
        <?php endwhile; // end of the loop. ?>   
    </div>
</main>

<?php echo get_template_part('pre-footer'); ?>
<?php get_footer(); ?>
