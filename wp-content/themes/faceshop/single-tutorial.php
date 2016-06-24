<?php get_header(); ?>
<main>
    <div class="main-wrapper container">	
        <h1><?php the_title(); ?></h1>
        <?php echo get_template_part('breadcrumb'); ?>
        <div class="row">
            <div id="main-content" class="col-sm-8 col-xs-12">
				<?php while (have_posts()) : the_post(); ?>
					<div id="page-content">
						<article>
							<?php
								$id = get_the_ID();    
								aio_display_edit_link($id);
								echo snh_social_share();
								
								echo '<div id="tut-des">'.get_post_meta($id, 'wpcf-description', true).'</div>';
								$link = get_post_meta($id, 'wpcf-video', true);
								if (strpos($link,'iframe') !== false) {
									$link=  str_replace('width="560"', 'width="700"', $link);
									$link=  str_replace('height="315"', 'height="500"', $link);
								}else{ // contain "watch"
									$link =  str_replace('watch?v=', 'embed/', $link);
									$link = '<iframe width="700" height="500" src="'.$link.'" frameborder="0" allowfullscreen></iframe>';
								}
								echo '<div class="youtube-video">'.$link.'</div>';
								
								the_content();                            
							?>
						</article>									                                
					</div>        
				<?php endwhile; // end of the loop. ?>
				
				<?php
					$article_type = get_theme_mod(AIO_ARTICLE_DISPLAY_TYPE, 1);
					$border_type = get_theme_mod(AIO_ARTICLE_BORDER, 1);                    
				?>
				<div class="block" id="related-tut">
					<h2>Các bài hướng dẫn khác</h2>
				   <?php             
						$args = array(
							'showposts' => 10,
							'post_type' => 'tutorial',
							'post__not_in' => array($id)                        
						);

						$wp_query = new WP_Query($args);
						if ($wp_query->have_posts()) {            
							while ($wp_query->have_posts()) : $wp_query->the_post();
								$title = get_the_title();                
								$img = aio_get_thumbnail(get_the_ID(), 300, 300);                                
								$des = get_post_meta(get_the_ID(), 'wpcf-des', true);
								$link = get_permalink(get_the_ID());
								$col = $article_type==1?'col-sm-4':'col-sm-6';

								echo '<div class="item tutorial">';
									echo '<div class="title"><a title="'.$title.'" alt="'.$title.'" href="'.$link.'">'.$title.'</a></div>';                                
								echo '</div>';
							endwhile;                       
						}
					?>					
				</div>  
            </div>

            <div id="sidebar" class="col-sm-4 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>