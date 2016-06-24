<?php
/*
  Template Name: Order
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

<main>	
    <div class="inner main-wrapper container-fluid">           
        <div class="col-sm-9 col-xs-12 col-xxs-12" id="main-content">
            <?php echo get_template_part('breadcrumb'); ?>
            <h1>Đặt hàng</h1>
            <div id="page-contact">
                <div class="col-sm-6 col-xs-12">
                    <h2  class="block-title">Xác nhận giỏ hàng</h2>
                <?php
                    $items = $_SESSION['aio_cart'];
                    $total = 0;
                    echo '<ul>';
                    foreach($items as $item){
                        $title = get_the_title($item['pid']);
                        $price = get_post_meta($item['pid'], 'wpcf-price', true);
                        $temp = $price * $item['quantity'];
                        echo '<li>'.$title.' x '.$item['quantity'].' = '.aio_display_money($temp).'</li>';
                        $total += $temp;
                    }
                    echo '</ul>';
                    echo '<div  id="final-sum"><strong>Tổng cộng: '.  aio_display_money($total).'</strong></div>';
                    
                    $boder_type = get_theme_mod(AIO_ORDER_BORDER, 1);
                    echo '<div id="shop-rule" class="border-'.$border_type.'">';
                        aio_display_edit_link(PID_ORDER);
                        //echo '<h2 class="block-title">Thông tin về giao nhận hàng</h2>';
                        $post = get_post(PID_ORDER);
                        echo $post->post_content;
                    echo '</div>';
                ?>
                </div>
                
                <div class="col-sm-6 col-xs-12">
                    <?php echo do_shortcode('[contact-form-7 id="107" title="Đặt hàng"]'); ?>
                </div>
            </div>
            
        </div>
        
        <div class="col-sm-3 col-xs-12 col-xxs-12" id="main-sidebar">
             <?php get_sidebar(); ?>
        </div>     
        
    </div>
</main>
	
<?php get_footer(); ?>
