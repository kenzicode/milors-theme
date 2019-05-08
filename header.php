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

<!-- 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
 -->	<script type="text/javascript" src="https://cdn.jsdelivr.net/minifill/0.0.4/minifill.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Dosis:400,500,600,700,800|Lato:400,700,900|Lora:400,700|Martel:400,700|Merriweather:400,700,900|Nanum+Myeongjo|Noto+Sans+KR:400,500,700|Open+Sans:400,600,700,800|PT+Sans+Narrow:400,700|PT+Serif|Pacifico|Raleway:400,500,700,800" rel="stylesheet">

	<?php 
		global $krocks_opt;
		$_logo = $krocks_opt['_logo']['url'];
		$_logosize = $krocks_opt['_logosize'];
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="blog-header pt-sm-3 pt-md-5 pt-lg-5 pt-xl-5">
    	<div class="container">
    		<div class="row justify-content-sm-center flex-nowrap align-items-center text-center">
	    		
    			<nav class="col-sm-2 navbar-expand-lg navbar-light mobileNav d-xl-none d-lg-none d-md-none">
	    			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>

          		<div class="site-branding col-sm-auto">

          			<?php if ($_logo !== '' ) { ?>
          			
          			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
          				<img src="<?php echo $_logo; ?>" alt="<?php bloginfo('name'); ?>" style="height:<?php echo $_logosize; ?>px; width: auto;"/>
          			</a>

          			<?php } else { ?>

					<h1 class="site-title text-dark"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          		
          			<?php }; ?>
				</div><!-- .site-branding -->

				<a class="menu-search-button col-sm-2 d-xl-none d-lg-none d-md-none" href="#" title="Search">
					<i class="fas fa-search" data-toggle="modal" data-target="#main-search"></i>
				</a>
				
			</div>
			<nav class="navbar navbar-expand-lg navbar-light mobileNav d-xl-none d-lg-none d-md-none">
				<div id="navbarNav" class="collapse navbar-collapse navbarNavDropdown">
					<?php
						wp_nav_menu( array(
							'container' => false,
							'menu' => __( 'Primary', 'milors' ),
							'theme_location' => 'primary',
							'menu_class'     => 'navbar-nav mr-auto',

						) );
					?><!-- site main nav -->
				</div>
			</nav>

    		<nav class="main-nav navbar-expand-lg navbar-expand-md navbar-light align-items-center text-center">
				<div class="container collapse navbar-collapse">
					<?php
						wp_nav_menu( array(
							'container' => false,
							'menu' => __( 'Primary', 'milors' ),
							'theme_location' => 'primary',
							'menu_class'     => 'nav sf-menu',
						) );
					?><!-- site main nav -->
				
					<a class="menu-search-button" href="#" title="Search">
						<i class="fas fa-search" data-toggle="modal" data-target="#main-search"></i>
					</a>
				</div>
		    </nav>

		    <!-- Menu Mobile -->

		</div>
    </header><!-- Header Closed -->

	<!-- Main Search Modal -->
	<div class="modal fade main-search" id="main-search" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>" >
				<div class="search-form input-group input-group-transparent">
					<div class="input-group-prepend">
			          	<span class="input-group-text"><i class="fas fa-search"></i></span>
			        </div>
					<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="input-text" placeholder="Search..." />
					<div class="search-message">
						<p> Type above and press <em>Enter</em> to search. Press <em>Esc</em> to cancel.</p>
					</div>
				</div>
		    </form>
	      </div>
	    </div>
	  </div>
	</div>

	<main id="content"><!-- Main Content Start -->
