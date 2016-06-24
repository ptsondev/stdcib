<?php
/*
  Template Name: STD Howto
 */
?>
<?php get_header(); ?>
<main>
    <div class="main-wrapper container">	
        <h1 class="moveL active"><?php the_title(); ?></h1>
        <?php echo get_template_part('breadcrumb'); ?>
        <div class="row">
            <div id="main-content" class="col-sm-8 col-xs-12">
			<?php 
				$id = get_the_ID();    
				aio_display_edit_link($id);
				?>
				
                <?php 
                    $args = array(
                        'showposts' => 0,                
                        'post_type' => 'tutorial',                                
                    );

                    $wp_query = new WP_Query($args);
                    if ($wp_query->have_posts()) {            
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            $title = get_the_title();                
                            $img = aio_get_thumbnail(get_the_ID(), 300, 300);                                
                            $des = get_post_meta(get_the_ID(), 'wpcf-des', true);
                            $link = get_permalink(get_the_ID());
                            //$col = $article_type==1?'col-sm-4':'col-sm-6';
							$col='col-sm-12';

                            echo '<div class="item tutorial '.$col.' col-xs-12 col-xss-12">';
                                echo '<div class="sub-item">';
                                    echo '<div class="thumb"><a href="'.$link.'"><img src="'.$img.'" /></a></div>';
                                    echo '<div class="title"><a href="'.$link.'">'.$title.'</a></div>';
                                    echo '<div class="des">'.  aio_get_description(get_the_ID()).'</div>';
                                echo '</div>';
                            echo '</div>';
                        endwhile;                       
                    }
					wp_reset_query();
                ?>        
            </div>

            <div id="sidebar" class="col-sm-4 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>