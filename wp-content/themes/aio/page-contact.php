<?php
/*
  Template Name: Contact
 */
?>
<?php get_header(); ?>
<?php get_template_part('top-slide'); ?>

<main>	
    <div class="inner main-wrapper container-fluid">           
        <div class="col-sm-9 col-xs-12 col-xxs-12" id="main-content">
            <?php echo get_template_part('breadcrumb'); ?>
            <h1>Liên hệ</h1>
            <div id="page-contact">
                <div class="col-sm-6 col-xs-12">
                    <h2 class="block-title">Thông tin liên hệ</h2>
                    <?php   
                        $address = get_theme_mod('address', '');
                        if(!empty($address)){
                            echo '<li>Địa chỉ: '.$address.'</li>';
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
                        
                        $contact = get_post(PID_CONTACT);                        
                        echo '<div id="more-contact-info">'.  $contact->post_content.'</div>';
                    ?>	
                </div>
                
                <div class="col-sm-6 col-xs-12">
                    <?php echo do_shortcode('[contact-form-7 id="100" title="Contact form"]'); ?>
                </div>
            </div>
            
        </div>
        
        <div class="col-sm-3 col-xs-12 col-xxs-12" id="main-sidebar">
             <?php get_sidebar(); ?>
        </div>     
        
    </div>
</main>
	
<?php get_footer(); ?>
