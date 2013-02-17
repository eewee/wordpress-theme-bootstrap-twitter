<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Eewee_Bootstrap_Twitter
 * @since Eewee Bootstrap Twitter 0.1
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale1.0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<?php
    
/*
// DEMO
<div class="navbar navbar-static-top">
    <div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">Title</a>
        <div class="nav-collapse collapse" style="height: 0px; ">
        <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
            </ul>
            </li>
        </ul>
        <form class="navbar-search pull-left" action="">
            <input type="text" class="search-query span2" placeholder="Search">
        </form>
        <ul class="nav pull-right">
            <li><a href="#">Link</a></li>
            <li class="divider-vertical"></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
            </li>
        </ul>
        </div><!-- /.nav-collapse -->
    </div>
    </div><!-- /navbar-inner -->
</div>
*/    






/***********************************
 *  MENU
 ***********************************/
?>
<div class="navbar navbar-static">
    <div class="navbar-inner">
        <div class="container" style="width:auto;">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

            <div class="nav-collapse">
                <?php
                wp_nav_menu(
                    array(
                        'container_class' => 'menu-header',
                        'walker' => new Bootstrap_Navbar_Nav_Walker(),
                        'menu_class' => 'nav',
                        'theme_location' => 'top_menu'
                    )
                ); ?>

                <form method="get" action="<?php echo home_url( '/' ); ?>" id="search-form" class="navbar-search pull-right">
                    <input class="search-query input-small" name="s" type="text" placeholder="Search">
                </form>
            </div><!--/.nav-collapse -->

        </div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- navbar -->    

    
    
    
    
    
<div id="page" class="hfeed <?php echo ToolsController::getPageSize(); ?>">
    
    <?php /*
    <div class="row-fluid">
	<header id="branding" class="span12" role="banner">
             <!--MENU HERE-->
	</header>
    </div>
    */ ?>
    
    <div class="row-fluid">
	<div id="main" class="span12">
            