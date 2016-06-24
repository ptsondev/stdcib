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
        </div>    
        
        <div class="col-sm-3 col-xs-12 col-xxs-12" id="main-sidebar">
            <?php get_sidebar(); ?>
        </div>        
    </div>    
</main>


<?php get_footer(); ?>
