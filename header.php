<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Milors
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	
	<script src="https://unpkg.com/popper.js@1.14.4/dist/umd/popper.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="https://cdn.jsdelivr.net/minifill/0.0.4/minifill.min.js"></script> 

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Dosis:400,500,600,700,800|Lato:400,700,900|Lora:400,700|Martel:400,700|Merriweather:400,700,900|Nanum+Myeongjo|Noto+Sans+KR:400,500,700|Open+Sans:400,600,700,800|PT+Sans+Narrow:400,700|PT+Serif|Pacifico|Raleway:400,500,700,800" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	
    <header class="blog-header pt-5">
    	<div class="container">
    		<div class="flex-nowrap align-items-center text-center">
    			

          		<div class="site-branding">
		
					
						<h1 class="site-title text-dark"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>


            	</div><!-- .site-branding -->

        	</div>

        		
        		<div class="main-nav align-items-center text-center">

					<?php
						wp_nav_menu( array(
							'container' => false,
							'menu' => __( 'Primary', 'milors' ),
							'theme_location' => 'primary',
							'menu_class'     => 'nav sf-menu',
						) );
					?>

			    </div>


		</div>
    </header><!-- Header Closed -->
    
    <main id="content">
