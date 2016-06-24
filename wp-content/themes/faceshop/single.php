<?php get_header(); ?>
<?php get_template_part('top-slide'); ?>
<main>
    <div class="main-wrapper container">	
        <?php while (have_posts()) : the_post(); ?>
        <h1>Lợi ích từ STDWEB</h1>
        <?php echo get_template_part('breadcrumb'); ?>
        <div class="row">
            <div id="main-content" class="col-sm-8 col-xs-12">
                <?php the_content(); ?>
            </div>

            <div id="sidebar" class="col-sm-4 col-xs-12">
                 <?php get_sidebar(); ?>
            </div>
        </div>
        <?php endwhile; // end of the loop. ?>   
    </div>
</main>


<?php get_footer(); ?>
