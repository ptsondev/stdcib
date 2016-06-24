<?php get_header(); ?>
<main id="main-content" role="main">
  <div class="page-wrapper">  
    <h1 class="entry-title"><?php printf(__('Search Results for: %s', 'snh_base'), get_search_query()); ?></h1>
    </header>
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('entry'); ?>
    <?php endwhile; ?>        
  </div>
</main>
<?php get_footer(); ?>

