<?php
/*
  Template Name: Articles
 */
?>
<?php get_header(); ?>
<?php get_template_part('top-slide'); ?>

<main>	
    <div class="inner main-wrapper container-fluid">           
        <div class="col-sm-9 col-xs-12 col-xxs-12" id="main-content">
            <?php echo get_template_part('breadcrumb'); ?>
            <h1>Bài viết</h1>
            <?php 
                $article_type = get_theme_mod(AIO_ARTICLE_DISPLAY_TYPE, 1);
                $border_type = get_theme_mod(AIO_ARTICLE_BORDER, 1);
            ?>
            <div class="block list-article style-<?php echo $article_type?> border-<?php echo $border_type?>" id="page-articles">
               <?php             
                    $args = array(
                        'showposts' => get_theme_mod(AIO_ARTICLE_NUM_PER_PAGE, 10),
                        'paged' => $paged,
                        'post_type' => 'article',
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
            
            <div id="page-paginate">
                <?php if(function_exists('wp_simple_pagination')) {                
                    echo wp_simple_pagination();
                } 
                wp_reset_query();
                ?> 
            </div>
        </div>
        
        <div class="col-sm-3 col-xs-12 col-xxs-12" id="main-sidebar">
             <?php get_sidebar(); ?>
        </div>     
        
    </div>
</main>
	
<?php get_footer(); ?>
