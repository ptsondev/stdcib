<!DOCTYPE html>
<html style="margin-top:0!important;" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />    
        <?php wp_head(); ?>
        <link rel="author" href="https://plus.google.com/115203733107416811156" />
		<?php 
        $logo = get_theme_mod(AIO_BASIC_SITE_LOGO, '');
        $ico = aio_image_resize($logo, 20, 20, TRUE); 
        echo '<link rel="shortcut icon" href="'.$ico.'" />';
        ?>
    </head>

    <?php 
        $res_class = get_option(AIO_IS_RESPONSIVE, 'no')!='yes'? 'nores' : 'res';
    ?>
    <body <?php body_class($res_class); ?>>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
       
        <header id="header">
            <div class="main-wrapper">
                <div class="col col-sm-2 col-xs-6" id="site-logo-area">                          
                    <a href="/"><img id="site-logo" src="<?php echo $logo;?>" /></a>
                </div>

                <div class="col col-sm-7 col-xs-3" id="site-menu">
                    <div class="row"> 
                        <form id="search-form" action="/search-result">
                            <?php 
                                $key ='';
                                if(isset($_REQUEST['key'])){
                                    $key = check_plain($_REQUEST['key']);
                                }
                            ?>
                            <input name="key" type="text" placeholder="Tên sản phẩm / bài viết" value="<?php echo $key; ?>"/>
                            <input name="btnSearch" type="submit" value="Tìm kiếm" class="button"/>
                        </form>
                    </div>
                    <?php  get_template_part('main-menu'); ?>
                </div>
                
                <div id="hotline" class="col col-sm-3 col-xs-3"><?php echo get_theme_mod('hotline', '0908.143.576')?></div>
                
                <?php 
                if(get_option(AIO_IS_CART, 'no')=='yes'){
                    $count = isset($_SESSION['aio_cart'])? count($_SESSION['aio_cart']):0;
                    echo '<a href="'.  get_permalink(PID_CART).'"><div id="cart">('.$count.')</div></a>';
                }
                ?>
            </div>		
        </header>