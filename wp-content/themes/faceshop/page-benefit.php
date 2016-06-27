<?php
/*
  Template Name: STD Benefit
 */
?>
<?php get_header(); ?>
<main>
    <div class="main-wrapper container">	
        <?php while (have_posts()) : the_post(); ?>
        <h1 class="moveL active">Lợi ích từ CIBWEB</h1>
        <?php echo get_template_part('breadcrumb'); ?>
        <div class="row">
            <div id="main-content" class="col-sm-8 col-xs-12">
				<?php 
				$id = get_the_ID();    
				aio_display_edit_link($id);
				?>
                    <div class="block" id="std-benefit">	
							
                        <div id="std-benefit-1" class="ben"></div>
						<div>
                            <strong>1.Tiết kiệm chi phí</strong>:
							<p class="dropJx">Với mức giá khởi tạo ban đầu (thiết kế và lập trình) bằng 0, bạn chỉ phải bỏ ra số tiền hàng tháng để duy trì website, dao động trong khoảng 250k-500k tùy <a alt="Các gói website của CIBWEB" title="Các gói website của CIBWEB" href="<?php echo get_permalink(PID_STD_PACKAGE);?>">gói website</a>.
                            Quá rẻ so với những nhà thiết kế website chuyên nghiệp, với mức chất lượng tương đương.<br /><br />		</p>
                            <div class="center"><img src= "<?php echo PATH_TO_IMAGE; ?>loi-ich-01.jpg" alt="Tiết kiệm chi phí với mức chất lượng tốt nhất" title="Tiết kiệm chi phí với mức chất lượng tốt nhất" /><div class="img-des">Tiết kiệm chi phí với mức chất lượng tốt nhất</div></div>						
                        </div>
                        <div id="std-benefit-2" class="ben"></div>
						<div>
                            <strong>2.Ấn định ngân sách</strong>: 
							<p>Bạn hoàn toàn có thể chủ động tính toán ngân sách cho mình, có thể chọn gói website phù hợp, có thể chọn thanh toán theo tháng, theo năm, hoặc trọn đời.
                            Ngoài ra bạn còn có thể nâng cấp gói website lên, cũng như hủy dịch vụ bất cứ khi nào bạn cần.<br /><br />		</p>
                            <div class="center"><img src= "<?php echo PATH_TO_IMAGE; ?>loi-ich-02.jpg" alt="Lên kế hoạch với gói website phù hợp" title="Lên kế hoạch với gói website phù hợp" /><div class="img-des">Lên kế hoạch với gói website phù hợp</div></div>					
                        </div>
                        <div id="std-benefit-3" class="ben"></div>
						<div>
                            <strong>3.Tiện ích - Dễ sử dụng</strong>:
							<p>Hướng đến đối tượng người dùng là dân kinh doanh, phần quản trị của các website do STDWEB lập trình chú trọng đến việc tối giản hóa chức năng, giúp admin dễ sử dụng: đăng sản phẩm, theo dõi đơn hàng, xuất báo cáo...<br /><br />								</p>
                            <div class="center"><img src= "<?php echo PATH_TO_IMAGE; ?>loi-ich-03.jpg" alt="Quản trị website 1 cách dễ dàng nhất" title="Quản trị website 1 cách dễ dàng nhất" /><div class="img-des">Quản trị website 1 cách dễ dàng nhất</div></div>					
                        </div>
                        <div id="std-benefit-4" class="ben"></div>
						<div>
                            <strong>4.Giao diện tùy biến trực quan</strong>: 
							<p>Đây là 1 trong những tính năng nổi bật của website của STDWEB, giúp mỗi website trở nên độc đáo và riêng biệt hơn, thông qua công cụ tùy chỉnh giao diện 1 cách vô cùng trực quan.
                            Bạn hoàn toàn có thể điều chỉnh màu nền, màu chữ, kích cỡ toàn trang, có thể chọn cách hiển thị sản phẩm, có thể cho phép ẩn/hiện phần nào đó trên trang.
                            Và những thay đổi đó hiện lên ngay khi bạn thao tác trên 1 phần màn hình.<br /><br />								</p>
                            <div class="center"><img src= "<?php echo PATH_TO_IMAGE; ?>style.png" alt="Giao diện tùy biến trực quan" title="Giao diện tùy biến trực quan" /><div class="img-des">Giao diện tùy biến trực quan</div></div>					
                        </div>
                        <div id="std-benefit-5" class="ben"></div>
						<div>
                            <strong>5.Hỗ trợ SEO tốt</strong>: 
							<p>Đồng hành cùng các shop trong công cuộc xây dựng thương hiệu, STDWEB đã phát triển các website theo đúng chuẩn SEO onpage. Từ các cấu trúc, phân mục, tới các thẻ tiêu đề, liên kết, hình ảnh... đều được chỉnh theo công thức SEO khoa học.
                            Ngoài ra các phần like và comment facebook giúp website của bạn nhanh chóng được chia sẻ rộng rãi đến các mạng xã hội. Tất cả đã sẵn sàng để đưa website bạn lên thứ hạng cao trên các công cụ tìm kiếm như google.<br /><br />								</p>
                            <div class="center"><img src= "<?php echo PATH_TO_IMAGE; ?>loi-ich-04.jpg" alt="Sẵn sàng đưa website của bạn lên top google" title="Sẵn sàng đưa website của bạn lên top google" /><div class="img-des">Sẵn sàng đưa website của bạn lên top google</div></div>					
                        </div>
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
