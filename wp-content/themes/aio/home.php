<?php get_header(); ?>
<?php get_template_part('top-slide'); ?>

<main>	
    <div class="inner main-wrapper container-fluid">           
        <div class="col-sm-9 col-xs-12 col-xxs-12" id="main-content">
            <?php 
                $product_type = get_theme_mod(AIO_PRODUCT_DISPLAY_TYPE, 1);
                $border_type = get_theme_mod(AIO_PRODUCT_BORDER, 1);
                $col = get_theme_mod(AIO_PRODUCT_NUM_COL, 3);
            ?>
            <div class="block list-product style-<?php echo $product_type?> border-<?php echo $border_type?>" id="re-home-product">
                <h2 class="block-title">Sản phẩm nổi bật</h2>
                <?php                                 
                    $args = array(
                        'showposts' => get_theme_mod(AIO_PRODUCT_NUM_PER_PAGE, 12),
                        'post_type' => 'product',
                        'meta_query' => array(
                            array(
                                'key'     => 'wpcf-public',
                                'value'   => 1,                                    
                            ),
                            array(
                                'key'     => 'wpcf-home',
                                'value'   => 1,                                    
                            )
                        ),
                    );

                    $wp_query = new WP_Query($args);
                    if ($wp_query->have_posts()) {            
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            $title = get_the_title();                
                            $img = aio_get_thumbnail(get_the_ID(), 300, 300);                                
                            $des = get_post_meta(get_the_ID(), 'wpcf-des', true);
                            $sale = get_post_meta(get_the_ID(), 'wpcf-sale', true);  
                            $link = get_permalink(get_the_ID());

                            echo '<div class="item col-sm-'.$col.' col-xs-6 col-xss-12">';
                                if($sale=="1"){
                                    echo '<div class="sale"></div>';
                                }
                                echo '<div class="sub-item">';
                                    echo '<div class="thumb"><a href="'.$link.'"><img src="'.$img.'" /></a></div>';
                                    echo '<div class="title"><a href="'.$link.'">'.$title.'</a></div>';                                
                                    echo '<div class="price">Giá: <strong>'.  aio_display_price(get_the_ID()).'</strong></div>';
                                echo '</div>';
                            echo '</div>';
                        endwhile;
                        wp_reset_query();
                    }
                ?>
                <div id="view-all-product"><a class="button" href="<?php echo get_permalink(PID_PRODUCT)?>">Xem tất cả sản phẩm</a></div>
            </div>
        </div>
        
        <div class="col-sm-3 col-xs-12 col-xxs-12" id="main-sidebar">
             <?php get_sidebar(); ?>
        </div>     
        
    </div>
</main>
	
<?php get_footer(); ?>
