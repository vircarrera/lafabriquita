<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-site-verification" content="XbYZsqA3MaVaj7MLPZ-e3lYcsR31D0FVkCMQLg8tSmY" />
<title><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;600;700&family=Raleway:wght@600;700;900&display=swap" rel="stylesheet">
<!-- AQUI fuentes Google según prototipo -->
<link rel="stylesheet" href="https://i.icomoon.io/public/temp/cffbd3ca38/lafabriquita-icons/style.css">
<!-- <link rel="stylesheet" href="<?php //bloginfo( 'stylesheet_url' ); ?>"> -->
</head>
<body <?php body_class(); ?> >

<header class="c-header">    
    
    <input type="checkbox" id="check" class="e-check">
    <label for="check" class="e-burger">
        <div class="palo --uno"></div>
        <div class="palo --dos"></div>
        <div class="palo --tres"></div>
    </label>
    
    <div class="b-header --top">
        <div class="container w-1920">
            <a class="e-logo" href="<?php echo home_url(); ?>">
                <img src="<?php bloginfo( 'template_url' ); ?>/img/content/LOGO.svg">
            </a>
            <div class="e-menu --redes">
                <div class="e-search --header">
                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/' ); ?>/">
                        <input class="search__input" type="text" value="" name="s" id="s" class="search__input" />
                        <input type="hidden" name="search-type" value="normal" />
                        <button type="submit" name="submit" value="buscar">
                            <i class="iconos ico-lupa"></i>
                        </button>
                    </form>
                </div>
                <?php wp_nav_menu( array( 
                    'theme_location' => 'menuredes', 
                    'container' => 'false') 
                    ); 
                ?>
            </div>
        </div>
    </div>
    
    <nav class="b-header --bottom">        
        <div class="container w-1316">
            <div class="e-menu --top">
                <?php wp_nav_menu( array( 
                    'theme_location' => 'menutop', 
                    'container' => 'false') 
                    ); 
                ?>
                <?php 
                    wp_nav_menu( array( 
                        'theme_location' => 'menuredesfooter', 
                        'container' => 'false', 
                        'menu_class'=>'e-menu --redesheadermobile') 
                    ); 
                ?>
            </div>
        </div>
    </nav>
    
    

</header>

<div class="container principal">