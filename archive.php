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
		<div class="container">
		<div class="row">

			<div class="col-lg-8 col-md-6 col-sm-12 col-12 wn-recent-post-column">

			<?php if ( have_posts() ) : ?>

				<header class="featuredpage-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					?>
				</header><!-- .page-header -->


					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
		
						get_template_part( 'template-parts/content', 'archive' );

					endwhile; ?>


					<?php krckts_pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</div>

			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
