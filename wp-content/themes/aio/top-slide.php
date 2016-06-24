<?php
if(!is_home() && get_theme_mod(AIO_SLIDESHOW_IS_DISPLAY_ALL_PAGE,1)!=1){
    echo '<div class="page-split"></div>';
    return;
}
?>
<div id="home-slider" class="block">
<?php 
    $slide_type = get_theme_mod(AIO_SLIDESHOW_TYPE, 1);    
    if($slide_type==1){
        echo '<ul class="rslides slide-type-1">';
        $args = array(
            'showposts' => 5,
            'post_type' => 'slide'
        );

        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {
            
            while ($wp_query->have_posts()) : $wp_query->the_post();
                $title = get_the_title();                
                $img = get_post_meta(get_the_ID(), 'wpcf-img', true);
                $img = aio_image_resize($img, 700, 400, true);
                $des = get_post_meta(get_the_ID(), 'wpcf-des', true);
                $link = get_post_meta(get_the_ID(), 'wpcf-link', true);
                
                echo '<li>';
                echo '<a href="' . $link . '" title="' .$title . '" alt="' .$title. '"><img src="' . $img . '" /></a>';
                echo '<div class="slide-des">';
                echo '<div class="title">' .$title. '</div>';
                echo '<div class="info">' . $des . '</div>';
                echo '<a href="' .$link . '" class="button">Xem chi tiết</a>';
                echo '</div>';
                echo '</li>';
            endwhile;            
        }		
        echo '</ul>';
    }else if($slide_type==2){
        
        echo '<ul class="rslides slide-type-2">';
        $args = array(
            'showposts' => 5,
            'post_type' => 'slide'
        );

        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {
            
            while ($wp_query->have_posts()) : $wp_query->the_post();
                $title = get_the_title();                
                $img = get_post_meta(get_the_ID(), 'wpcf-img', true);
                $img = aio_image_resize($img, 1400, 500, true);
                $des = get_post_meta(get_the_ID(), 'wpcf-des', true);
                $link = get_post_meta(get_the_ID(), 'wpcf-link', true);
                echo '<li>';
                echo '<a href="' . $link . '" title="' .$title . '" alt="' .$title. '"><img src="' . $img . '" /></a>';
                echo '<div class="title">' .$title. '</div>';
                echo '</li>';
                
            endwhile;            
        }
        echo '</ul>';    
                
    }else if($slide_type==3){
        echo '<ul class="rslides">';
        $args = array(
            'showposts' => 5,
            'post_type' => 'slide'
        );

        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) {
            
            while ($wp_query->have_posts()) : $wp_query->the_post();
                $title = get_the_title();                
                $img = get_post_meta(get_the_ID(), 'wpcf-img', true);
                $des = get_post_meta(get_the_ID(), 'wpcf-des', true);
                $link = get_post_meta(get_the_ID(), 'wpcf-link', true);
            endwhile;            
        }
        echo '</ul>';   
    }
	wp_reset_query();
?>

</div>