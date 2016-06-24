<!DOCTYPE html>
<html style="margin-top:0!important;" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/vnd.microsoft.icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php snh_add_meta_tags(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />    
        <?php wp_head(); ?>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		

		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    </head>

    
    <body <?php body_class(); ?>>
        <header id="header">
            <div id="header-row-1">
                <div class="main-wrapper container">		
                    <div class="col-sm-3 col-xs-6 col-xxs-12 address" title="Địa chỉ công ty CIBWEB">211/58 Hoang Van Thu, F8, Q Phu Nhuan</div>
                    <div class="col-sm-3 col-xs-6 col-xxs-12 hotline" title="Số điện thoại hotline">0943340011</div>
                    <div class="col-sm-3 col-xs-6 col-xxs-12 email" title="Email nhận các phản hồi, yêu cầu, thắc mắc của CIBWEB">info.cibweb@gmail.com</div>
                    <div class="col-sm-3 col-xs-6 col-xxs-12 skype"><a title="Hỗ trợ kỹ thuật" class="skype-icon" href="skype:ptson89?chat">ptson89</a></div>                             
                </div>
            </div>

            <div id="header-row-2">
                <div class="main-wrapper container">			
                    <div class="col-sm-2 col-xs-12 col-xxs-12" id="site-logo"><a href="/"><img src="<?php echo PATH_TO_IMAGE; ?>logo.png" title="Constantly Improve Brand" alt="Constantly Improve Brand"/></a></div>
                    <div class="col-sm-10 col-xs-12 col-xxs-12" id="site-menu">
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>					 
                                </div>

                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">		
                                    <!-- real menu links here -->						
                                        <?php wp_nav_menu( array( 'menu'=>'main-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'main-menu' ) ); ?>						
                                   
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>		
                </div>
            </div>		
        </header>
