<div class="block row" id="product-category">
        <h2 class="block-title">Nhóm sản phẩm</h2>
        <?php 
            $terms = get_terms('product_category', array('hide_empty'=>false, 'parent'=>0));
            echo '<ul>';
            foreach($terms as $term){
                echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
                $children = get_terms('product_category', array('hide_empty'=>false, 'parent'=>$term->term_id));
                foreach($children as $child){
                    echo '<li class="dep-2"> <a href="'.get_term_link($child).'">'.$child->name.'</a></li>';
                }
            }
            echo '</ul>';
        ?>
    </div>
    
        <?php 
            $product_type = get_theme_mod(AIO_SIDEBAR_PRODUCT_TYPE, 1);            
            $border_type = get_theme_mod(AIO_SIDEBAR_PRODUCT_BORDER, 1);
            $num =  get_theme_mod(AIO_SIDEBAR_PRODUCT_NUMBER, 5);
        ?>
	<div class="block row list-product style-<?php echo $product_type; ?> border-<?php echo $border_type?>" id="sticky-product">
		<h2 class="block-title">Sản phẩm yêu thích</h2>
		<?php 
                $args = array(
                    'showposts' => $num,
                    'post_type' => 'product',
                    'meta_query' => array(
                        array(
                            'key' => 'wpcf-public',
                            'value' => 1
                        ),
                        array(
                            'key' => 'wpcf-sticky',
                            'value' => 1
                        ),
                    ),
                );

                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()) {            
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        $title = get_the_title();                
                        $img = aio_get_thumbnail(get_the_ID(), 300, 300);                                
                        $des = get_post_meta(get_the_ID(), 'wpcf-des', true);
                        $link = get_permalink(get_the_ID());
                        
                        echo '<div class="item">';
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
		
	<?php
        if(get_theme_mod(AIO_SIDEBAR_IS_DISPLAY_CONTACT_INFO, 1) == 1){   
            $border_type = get_theme_mod(AIO_SIDEBAR_CONTACT_BORDER, 1);
        ?>        

        <h2 class="block-title">Thông tin liên hệ</h2>
	<div class="block row" id="block-contact">
            <div class="border border-<?php echo $border_type;?>">		
                <?php   
                    $temp = get_theme_mod('address', '');
                    if(!empty($temp)){
                        echo '<li>Địa chỉ: '.$temp.'</li>';
                    }
                    $temp = get_theme_mod('phone', '');
                    if(!empty($temp)){
                        echo '<li>Điện thoại: '.$temp.'</li>';
                    }
                    $temp = get_theme_mod('hotline', '');
                    if(!empty($temp)){
                        echo '<li>Hotline: '.$temp.'</li>';
                    }
                    $temp = get_theme_mod('skype', '');
                    if(!empty($temp)){
                        echo '<li>Skype: <a href="skype:'.$temp.'?chat">'.$temp.' </a></li>';
                    }
                    $temp = get_theme_mod('email', '');
                    if(!empty($temp)){
                        echo '<li>Email: <a href="mailto:'.$temp.'">'.$temp.'</a></li>';
                    }
                ?>		
	</div>	</div>	
    <?php } ?>
	
     <?php
        if(get_theme_mod(AIO_SIDEBAR_IS_DISPLAY_FANPAGE, 'yes') == 'yes'){        
            $link = get_theme_mod('link_facebook', '')
        ?>
        <div class="block row">
            <br />
           <div class="fb-page" data-href="<?php echo $link; ?>" data-width="380" data-height="300" data-hide-cover="true" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo $link; ?>"><a href="<?php echo $link; ?>"><?php echo get_bloginfo('name'); ?></a></blockquote></div></div>       
        </div>
     <?php } ?>
