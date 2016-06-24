<div id="why-using-stdweb">
    <div class="main-wrapper container">
        <div class="col-sm-4 col-xs-12">
            <h1>Cùng bạn khởi nghiệp</h1>
            <h4>CIBWEB sẽ sát cánh cùng thương hiệu của bạn từ những ngày đầu</h4>
        </div>
        <div class="col-sm-4 col-xs-12">
            <h3>Lợi ích từ cibweb?</h3>
            <?php $link = get_permalink(PID_STD_BENEFIT);?>
				<li><a href="<?php echo $link?>#std-benefit-1">Tiết kiệm chi phí ban đầu</a></li>
				<li><a href="<?php echo $link?>#std-benefit-2">Ấn định ngân sách phù hợp giai đoạn</a></li>
				<li><a href="<?php echo $link?>#std-benefit-3">Tiện ích, dễ sử dụng</a></li>
				<li><a href="<?php echo $link?>#std-benefit-4">Giao diện tùy biến trực quan</a></li>
				<li><a href="<?php echo $link?>#std-benefit-5">Hỗ trợ SEO tốt</a></li>				
        </div>
        <div class="col-sm-4 col-xs-12">
            <h3>Hướng dẫn cơ bản</h3>
            <?php 
				$args = array(
							'showposts' => 5,
							'post_type' => 'tutorial'
						);

						$wp_query = new WP_Query($args);
						if ($wp_query->have_posts()) {            
							while ($wp_query->have_posts()) : $wp_query->the_post();
								$title = get_the_title();                
								$link = get_permalink(get_the_ID());								
									echo '<li><a title="'.$title.'" alt="'.$title.'" href="'.$link.'">'.$title.'</a></li>';								
							endwhile;                       
						}
						wp_reset_query();
			?>
        </div>
    </div>
</div>