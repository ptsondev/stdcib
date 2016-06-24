<div class="block" id="product-category">
    <h2 class="block-title">Lợi ích từ CIBWEB</h2>
	<?php $link = get_permalink(PID_STD_BENEFIT);?>
    <ul>
        <li><a title="Tiết kiệm chi phí ban đầu khi sử dụng CIBWEB" alt="Tiết kiệm chi phí ban đầu khi sử dụng CIBWEB" href="<?php echo $link?>#std-benefit-1">Tiết kiệm chi phí ban đầu</a></li>
        <li><a title="Ấn định ngân sách phù hợp giai đoạn" alt="Ấn định ngân sách phù hợp giai đoạn" href="<?php echo $link?>#std-benefit-2">Ấn định ngân sách phù hợp giai đoạn</a></li>
        <li><a title="Hệ thống CIBWEB Tiện ích, dễ sử dụng" alt="Hệ thống CIBWEB Tiện ích, dễ sử dụng" href="<?php echo $link?>#std-benefit-3">Tiện ích, dễ sử dụng</a></li>
        <li><a title="Giao diện CIBWEB tùy biến trực quan" alt="Giao diện CIBWEB tùy biến trực quan" href="<?php echo $link?>#std-benefit-4">Giao diện tùy biến trực quan</a></li>
        <li><a title="CIBWEB hỗ trợ SEO tốt" alt="CIBWEB hỗ trợ SEO tốt" href="<?php echo $link?>#std-benefit-5">Hỗ trợ SEO tốt</a></li>	
    </ul>    	
</div>


<div class="block" id="product-category">
    <h2 class="block-title">Hướng dẫn cơ bản</h2>	
    <ul>
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
    </ul>    	
</div>
