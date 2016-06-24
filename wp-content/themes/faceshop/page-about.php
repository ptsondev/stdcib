<?php
/*
  Template Name: About STD
 */
?>
<?php get_header(); ?>
<main>
    <div class="main-wrapper container">	
        <?php while (have_posts()) : the_post(); ?>
        <h1 class="moveL active">CIBWEB – CHÚNG TÔI LÀ AI</h1>
        <?php echo get_template_part('breadcrumb'); ?>
        <div class="row">
            <div id="main-content" class="col-sm-8 col-xs-12">
				<?php $id = get_the_ID();    
					echo snh_social_share();
                    aio_display_edit_link($id); ?>
                <div class="block" id="std-introduct">
                        - Thành lập trong giai đoạn marketing online trở nên phổ biến rộng rãi, các mạng xã hội và ứng dụng công nghệ cho phép 
                        mỗi người đều có thể mở shop bán hàng online.  <br /><br />
                        - Việc sử dụng mạng xã hội để kinh doanh online (trong thời điểm hiện tại) vẫn đem lại hiệu quả tương đối so với thời gian trước đây.
                        Tuy nhiên nếu các bạn có nhiều kinh nghiệm và đã sử dụng chúng sau 1 thời gian dài sẽ nhận ra hiệu năng dần đi xuống.   <br /><br />
                        <div class="center"><img alt="Hiệu quả quảng cáo trên các kênh mạng xã hội giảm dần" title="Hiệu quả quảng cáo trên các kênh mạng xã hội giảm dần" src= "<?php echo PATH_TO_IMAGE;?>updown.jpg" /><div class="img-des">Hiệu quả quảng cáo trên các kênh mạng xã hội giảm dần</div></div> <br /><br />
                        - Đây cũng là điều vô cùng dễ hiểu, bởi hiện trạng các shop online mọc lên như nấm, và nhu cầu quảng cáo của họ cũng tăng theo, dẫn đến sự cạnh tranh cho từng từ khóa khi đặt quảng cáo.
                        Cuối cùng là <strong>chi phí bỏ ra để chạy quảng cáo ngày càng tăng nhanh.</strong> <br /><br />
                        - Không dừng lại ở đó, điều tồi tệ nhất xảy ra khi các mạng xã hội từ chối quảng cáo của bạn, hoặc thay đổi thuật toán khiến <strong>quảng cáo của bạn khó tiếp cận khách hàng hơn</strong>.
                        Điển hình là đợt thay đổi thuật toán của facebook vào tháng 4/2015, khiến cắt giảm hoàn toàn lượng truy cập vào fanpage của các shop.<br /><br />
						<div class="center"><img alt="Ngày càng ít khách hàng tiếp cận được đến quảng cáo của bạn" title="Ngày càng ít khách hàng tiếp cận được đến quảng cáo của bạn" src= "<?php echo PATH_TO_IMAGE;?>customer-see-your-ads.jpg" /><div class="img-des">Ngày càng ít khách hàng tiếp cận được đến quảng cáo của bạn</div></div> <br /><br />
						
                        - Cuối cùng, chuyện gì sẽ xảy ra, khi mà 1 ngày nào nọ việc kinh doanh của bạn đang diễn ra tốt đẹp thì các mạng xã hội không còn nữa, không cho phép đăng quảng cáo nữa? 
                        Các chủ shop <strong>hoàn toàn phụ thuộc vào các mạng xã hội</strong> này khi đó khó có thể xoay sở kiếm đầu ra với lượng hàng tồn đầy kho.<br /><br />
						<div class="center"><img alt="Quảng cáo của bạn hoàn toàn phục thuộc vào mạng xã hội" title="Quảng cáo của bạn hoàn toàn phục thuộc vào mạng xã hội" src= "<?php echo PATH_TO_IMAGE;?>phu-thuoc-mang-xa-hoi.jpg" /><div class="img-des">Quảng cáo của bạn hoàn toàn phục thuộc vào mạng xã hội</div></div> <br /><br />
                        - Đó là lý do bạn cần đến 1 website - 1 mảnh đất riêng cho chính mình trên internet, 1 nơi mà bạn hoàn toàn có thể dễ dàng tùy chỉnh thông tin, sản phẩm,... cho riêng shop của mình.
                        Và đó cũng chính là lý do ra đời của <strong><a href="http://cibweb.com" alt="cibweb" title="cibweb">CIBWEB</a></strong>.
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
