<?php
/*
  Template Name: Contact
 */
?>
<?php get_header(); ?>

<main>	
    <div class="main-wrapper container">	      
		<h1 class="moveL active"><?php the_title(); ?></h1>
        <?php echo get_template_part('breadcrumb'); ?>
        <div class="row">	
			<div id="main-content" class="col-sm-8 col-xs-12">
				<div id="page-contact">
					<div class="col-sm-6 col-xs-12">
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
						<?php echo do_shortcode('[contact-form-7 id="7" title="Contact form 1"]'); ?>
					</div>
					
					<div id="cibweb-map">
						<iframe src="https://www.google.com/maps/d/u/0/embed?mid=zaoU4q28B0WQ.kJdKmMd6s9HU" width="800" height="580"></iframe>
					</div>
				</div>
				
			</div>
			
			<div class="col-sm-3 col-xs-12 col-xxs-12" id="main-sidebar">
				 <?php get_sidebar(); ?>
			</div>     
        </div>
    </div>
</main>
	
	
<?php get_footer(); ?>
