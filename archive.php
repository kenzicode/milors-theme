<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Milors
 */

get_header();
?>

	<div id="primary" class="container py-5">
		<main id="main" class="site-main">

		<div class="row">

		<div class="col-8 col-md-8 col-sm-12">

		<?php if ( have_posts() ) : ?>

			<header class="featuredpage-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<div class="row">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
	
					get_template_part( 'template-parts/content', 'grid' );

				endwhile; ?>
			</div>
			
				<?php the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>

		<div class="col-4 col-md-4 col-sm-12">
				<?php get_sidebar(); ?>
			</div>
	    </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
