<?php get_header(); ?>
<?php get_template_part('top-slide'); ?>
<main id="single-result">
    <div class="inner main-wrapper container-fluid">
        <div id="page-left-col" class="col-sm-8 col-xs-8 col-xxs-12">
			<?php get_template_part('breadcrumb'); ?>
            <?php while (have_posts()) : the_post(); ?>
                <div id="page-content">
                    <h1 id="page-title"><?php the_title(); ?></h1>
					 <?php
						 $id = get_the_ID();    
                            aio_display_edit_link($id);
					?>
                    <article>
                        <?php
						//echo snh_social_share();      
						the_post_thumbnail();
                        the_content();		
						
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium' );
                        ?>						
                    </article>														
					
					<div id="btn-share">Share lên facebook<span id="hand-share"></span></div>
						<script>
							jQuery(document).ready(function($){	
								$('#btn-share').click(function(){									
									FB.ui({
										method: "feed",
										//name: "Kiểm tra",
										caption: "KẾT QUẢ: <?php the_title(); ?>",
										link: "<?php echo get_permalink(PID_BMI)?>",
										description: $('article').text(),
										picture: "<?php echo $thumb['0']?>"
									}, function(response){});
								});															
							});
						</script>
						
                </div>
            <?php endwhile; // end of the loop. ?>
        </div>
        
        <div class="col-sm-4 col-xs-4 col-xxs-12" id="main-sidebar">
            <?php get_sidebar(); ?>
        </div>        
    </div>    
</main>
<?php get_footer(); ?>