<?php get_header(); ?>
<?php get_template_part('top-slide'); ?>

<main>	
    <div class="inner main-wrapper container-fluid">           
        <div class="col-sm-9 col-xs-12 col-xxs-12" id="main-content">
            <?php echo get_template_part('breadcrumb'); ?>
            
            <?php while (have_posts()) : the_post(); ?>            
                <article>
                    <?php
                    $id = get_the_ID();    
                    aio_display_edit_link($id);                   
                    echo '<div id="product-info">';                        
                        echo '<div id="product-images" class="col-sm-6 col-xs-12">';
                            // images
                            $images = get_post_meta($id, 'wpcf-images');
                            if(count($images) > 1){
                                echo '<ul class="pgwSlideshow">';
                                foreach($images as $img){
                                    echo '<li><img src="'.$img.'" /></li>';
                                }
                                echo '</ul>';
                                ?>
                                <script>
                                    $(document).ready(function() {
                                        $('.pgwSlideshow').pgwSlideshow({
                                            maxHeight:600
                                        });
                                    });
                                </script>
                            <?php 
                            }else if(count($images)==1){
                                $img = reset($images);
                                echo '<img src="'.$img.'" />';
                            }
                        echo '</div>';
                                          
                        echo '<div id="col-pro-info" class="col-sm-6 col-xs-12">';
                            echo '<h1 id="page-title">'.  get_the_title().'</h1>';
                            echo '<div id="hidden-message">Đã thêm vào giỏ hàng</div>';
                            echo snh_social_share();

                            $term = wp_get_post_terms($id, 'product_category');     
                            $term=reset($term);
                            echo '<div class="price">Giá: <strong>'.  aio_display_price(get_the_ID()).'</strong></div>';
                            echo '<div class="product-category">Nhóm sản phẩm: <a href="'.  get_term_link($term).'">'.$term->name.'</a></div>';                            
                            echo '<div class="des">'.aio_get_description(get_the_ID()).'</div>';
                            echo '<div class="order">'.aio_display_button_order(get_the_ID()).'</div>';
                        echo '</div>';
                                                
                    echo '</div>'; // end product info
                    
                    echo '<div id="post-content">'.get_the_content().'</div>';
                    ?>
                </article>
            <?php endwhile; // end of the loop. ?>
            
            
            <?php                    
                $product_type = get_theme_mod(AIO_PRODUCT_DISPLAY_TYPE, 1);
                $border_type = get_theme_mod(AIO_PRODUCT_BORDER, 1);
                $col = get_theme_mod(AIO_PRODUCT_NUM_COL, 3);
            ?>
            
            <div class="block list-product style-<?php echo $product_type?> border-<?php echo $border_type?>" id="related-product">
                <h2 class="block-title">Sản phẩm liên quan</h2>
                <?php                                 
                    $args = array(
                        'showposts' => get_theme_mod(AIO_PRODUCT_NUM_RELATED, 3),
                        'post_type' => 'product',
                        'post__not_in' => array($id),
                        'meta_query' => array(
                            array(
                                'key'     => 'wpcf-public',
                                'value'   => 1,                                    
                            )                            
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_category',
                                'terms'    => $term->term_id
                            ),
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
                </div>                 
        
            </div>
        
        <div class="col-sm-3 col-xs-12 col-xxs-12" id="main-sidebar">
             <?php get_sidebar(); ?>
        </div>     
        
    </div>
</main>
	
<?php get_footer(); ?>

