
<footer id="footer">
    <div class="page-split"></div>
    <div class="main-wrapper">
        <div style="position:relative; display:inline-block;width:100%;">		
            <div class="col col-sm-6 col-xs-12 col-xxs-12">
                <div id="footer-info">
                    <?php 
                    $temp = get_theme_mod('address', '');
                    if(!empty($temp)){
                        echo '<div>Địa chỉ: '.$temp.'</div>';
                    }
                    $temp = get_theme_mod('phone', '');
                    if(!empty($temp)){
                        echo '<div>Điện thoại: '.$temp.'</div>';
                    }
                    $temp = get_theme_mod('hotline', '');
                    if(!empty($temp)){
                        echo '<div>Hotline: '.$temp.'</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="col col-sm-6 col-xs-12 col-xxs-12 pull-right" id="social-region">
                <?php 
                $temp = get_theme_mod('link_flickr', '');
                if(!empty($temp)){
                    echo '<a href="'.get_theme_mod('link_flickr', '').'" ><span class="social flickr"></span></a>';
                }
                $temp = get_theme_mod('link_plus', '');
                if(!empty($temp)){
                    echo '<a href="'.get_theme_mod('link_plus', '').'" ><span class="social google"></span></a>';
                }
                $temp = get_theme_mod('link_youtube', '');
                if(!empty($temp)){
                    echo '<a href="'.get_theme_mod('link_youtube', '').'" ><span class="social youtube"></span></a>';
                }
                $temp = get_theme_mod('link_pinterest', '');
                if(!empty($temp)){
                    echo '<a href="'.get_theme_mod('link_pinterest', '').'" ><span class="social pinterest"></span></a>';
                }
                $temp = get_theme_mod('link_twitter', '');
                if(!empty($temp)){
                    echo '<a href="'.get_theme_mod('link_twitter', '').'" ><span class="social twit"></span></a>';
                }      
                $temp = get_theme_mod('link_facebook', '');
                if(!empty($temp)){
                    echo '<a href="'.get_theme_mod('link_facebook', '').'" ><span class="social face"></span></a>';
                }                         
                ?>                              
            </div>
        </div>        
    </div>		
</footer>
<div id="copy-right">
    © Copyright 2015 by <a href="http://cibweb.com" target="_blank">CIBWEB</a>
</div>
<?php wp_footer(); ?>
</body>
</html>