<?php
/*
  Template Name: Page Cart 
 */
?>
<?php 
    if(get_option(AIO_IS_CART, 'no')!='yes'){
        aio_display_message_no_cart();
        return;
    }
?>
<?php get_header(); ?>
<?php get_template_part('top-slide'); ?>
<main id="single-article">
    <div class="inner main-wrapper container-fluid">
        <div class="col-sm-9 col-xs-12 col-xxs-12" id="main-content">
            <?php get_template_part('breadcrumb'); ?>
            <?php while (have_posts()) : the_post(); ?>
                <div id="page-content">
                    <h1 id="page-title">Giỏ hàng</h1>
                    <?php 
                    $cart = isset($_SESSION['aio_cart'])? $_SESSION['aio_cart']:array();
                    if(empty($cart)){
                        echo 'Bạn chưa có sản phẩm nào trong giỏ hàng.';
                    }else{
                        $total = 0;
                        foreach($cart as $item){
                            $post = get_post($item['pid']);
                            $url = get_permalink($item['pid']);
                            $path = aio_get_thumbnail($item['pid'], 300, 300);            

                            echo '<div class="cart-item item-'.$item['pid'].'">';
                                echo '<div class="thumbnail col-sm-2">';
                                    echo '<a href="'.$url.'"><img src="'.$path.'" /></a>';
                                echo '</div>';
                                echo '<div class="col name-info col-sm-2">';
                                    echo '<div class="title"><a href="'.$url.'">'. $post->post_title .'</a></div>';                                   
                                echo '</div>';
                                echo '<div class="col price col-sm-2">'. aio_display_price($item['pid']).'</div>';                
                                echo '<div class="col quantity col-sm-2">X <input class="txtQuantity" type="text" pid="'.$item['pid'].'" name="quantity-'.$item['pid'].'" value="'.$item['quantity'].'" /><span class="btn-refresh"></span></div>';
                                $price = get_post_meta($item['pid'], 'wpcf-price', true);
                                $cost = $price * $item['quantity'];
                                $total += $cost;
                                echo '<div class="col cost col-sm-3">= '. aio_display_money($cost).'</div>';
                                echo '<div class="col remove col-sm-1"><span class="button remove-item" pid="'.$item['pid'].'"></span></div>';
                            echo '</div>';
                        }
                        echo '<div class="sum"><div class="col-sm-10 total-cost">Tổng: '.  aio_display_money($total).'</div><div class="col-sm-2 continue"><a href="'.  get_permalink(PID_ORDER).'" class="button">Xác nhận</a></div></div>';        
                    }// end if
                    ?>								                                
                </div>        
            <?php endwhile; // end of the loop. ?>                
        </div>    
        
        <div class="col-sm-3 col-xs-12 col-xxs-12" id="main-sidebar">
            <?php get_sidebar(); ?>
        </div>        
    </div>    
</main>
<?php get_footer(); ?>
