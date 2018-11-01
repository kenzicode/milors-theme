<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Milors
 */

get_header();

$sidebar = get_post_meta( get_the_ID(), '_milors_sidebarpage', true );

?>
	
<?php if ( $sidebar == 'no-sidebar' ) : ?>
	<div id="primary" class="no-sidebar container py-5">
<?php else : ?>
	<div id="primary" class="container py-5">
<?php endif; ?>

	<div class="row">

		<?php if ( $sidebar === 'rightSidebar' ) { ?> 

		<div class="col-8 col-md-8 col-sm-12 pr-5 page-padding-top">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</div><!-- .col -->

		<div class="col-4 col-md-4 col-sm-12 widgets-no-padding">
			<?php get_sidebar(); ?>
		</div>

		<?php } elseif ( $sidebar === 'leftSidebar' ) { ?>

		<div class="col-4 col-md-4 col-sm-12">
			<?php get_sidebar(); ?>
		</div>

		<div class="col-8 col-md-8 col-sm-12 pl-5 page-padding-top">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</div><!-- .col -->

		<?php } else { ?>

		<div class="col-12 col-md-12 col-sm-12 no-sidebar">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</div><!-- .col -->

		<?php } ?>

	</div><!-- .row -->

	</div><!-- #primary -->

<?php
get_footer();
