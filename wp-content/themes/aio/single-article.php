<?php get_header(); ?>
<?php get_template_part('top-slide'); ?>
<main id="single-article">
    <div class="inner main-wrapper container-fluid">
        <div class="col-sm-9 col-xs-12 col-xxs-12" id="main-content">
            <?php get_template_part('breadcrumb'); ?>
            <?php while (have_posts()) : the_post(); ?>
                <div id="page-content">
                    <h1 id="page-title"><?php the_title(); ?></h1>
                    <article>
                        <?php
                            $id = get_the_ID();    
                            aio_display_edit_link($id);
                            echo snh_social_share();
                            the_content();                            
                        ?>
                    </article>									                                
                </div>        
            <?php endwhile; // end of the loop. ?>
            
            <?php
                $article_type = get_theme_mod(AIO_ARTICLE_DISPLAY_TYPE, 1);
                $border_type = get_theme_mod(AIO_ARTICLE_BORDER, 1);                    
            ?>
            <div class="block list-article style-<?php echo $article_type?> border-<?php echo $border_type?>" id="related-articles">
                <h2>Các bài viết khác</h2>
               <?php             
                    $args = array(
                        'showposts' => get_theme_mod(AIO_ARTICLE_NUM_RELATED, 6),
                        'post_type' => 'article',
                        'post__not_in' => array($id),
                        'meta_query' => array(
                            array(
                                'key'     => 'wpcf-public',
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
                            $link = get_permalink(get_the_ID());
                            $col = $article_type==1?'col-sm-4':'col-sm-6';

                            echo '<div class="item '.$col.' col-xs-6 col-xss-12">';
                                echo '<div class="sub-item">';
                                    echo '<div class="thumb"><a href="'.$link.'"><img src="'.$img.'" /></a></div>';
                                    echo '<div class="title"><a href="'.$link.'">'.$title.'</a></div>';
                                    echo '<div class="des">'.  aio_get_description(get_the_ID()).'</div>';
                                echo '</div>';
                            echo '</div>';
                        endwhile;                       
                    }
                ?>
                
        </div>    
    </div>
        
        <div class="col-sm-3 col-xs-12 col-xxs-12" id="main-sidebar">
            <?php get_sidebar(); ?>
        </div>        
    </div>    
</main>

<script>
	<!-- update size iframe -->
	jQuery(document).ready(function($){	
	//#page-left-col iframe
		var w = $('#page-left-col').width()-50;
		$('#page-left-col iframe').width(w);
		var h = w*5/8;
		$('#page-left-col iframe').height(h);
	});
</script>

<?php get_footer(); ?>