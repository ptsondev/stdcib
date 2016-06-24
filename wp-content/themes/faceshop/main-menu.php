<?php if(get_option(AIO_IS_RESPONSIVE, 'no')=='yes'){ ?>
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>         
</div>
<div id="navbarCollapse" class="collapse navbar-collapse">
    <?php     
    wp_nav_menu( array( 'menu'=>'main-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'main-menu' ) ); ?>
</div>

<?php }else{
    wp_nav_menu( array( 'menu'=>'main-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'main-menu' ) );
} ?>
