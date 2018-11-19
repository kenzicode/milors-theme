<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Milors
 */

$nextprev = get_post_meta( get_the_ID(), '_milors_nexprev_post' );
$relpost = get_post_meta( get_the_ID(), '_milors_related_post' );
$sharepost = get_post_meta( get_the_ID(), '_milors_share' );
$author = get_post_meta( get_the_ID(), '_milors_author' );
$headerStyle = get_post_meta( get_the_ID(), '_milors_single_post_header', true );

$img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>

	<?php if ($headerStyle == 'regularHeader') : ?>

	    <div class="post-media post-image">
		    <img src="<?php echo $img[0]; ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
		</div>

		<header class="entry-header py-3">
			<span class="post-category">
	            <?php the_category() ?>
	        </span>

			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title pt-3">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title pt-3"><a href="' . esc_url( the_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>

			<div class="entry-meta">
	            <span class="author vcard">
	               	<span>By</span><?php echo get_the_author(); ?>
	            </span>
	            <span class="posted-on line">
	                <span>On</span><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
	            </span>
	        </div>
		</header><!-- .entry-header -->

	<?php elseif ($headerStyle == 'bigimgHeader') : ?>

		<header class="entry-header pt-5 pb-3">
			<span class="post-category">
	            <?php the_category() ?>
	        </span>

			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title pt-3">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title pt-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>

			<div class="entry-meta">
	            <span class="author vcard">
	               	<span>By</span><?php echo get_the_author(); ?>
	            </span>
	            <span class="posted-on line">
	                <span>On</span><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
	            </span>
	        </div>
		</header><!-- .entry-header -->

	<?php endif; ?>

	
	<?php if ($headerStyle == 'leftHeader') : ?>
	<div class="entry-content">
	<?php else : ?>
	<div class="entry-content">
	<?php endif; ?>

		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'milors-theme' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'milors-theme' ),
			'after'  => '</div>',
		) );

		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer my-4 pb-2">
		<?php 
			milors_theme_entry_footer(); 
			milors_share_button();
		?>
	</footer><!-- .entry-footer -->

	<nav class="navigation post-navigation pb-5">
		<div class="nav-links row justify-content-between">

			<?php previous_post_link( '<div class="prev-post col-12 col-md-4 col-lg-4 col-xl-4 py-3">%link</div>', '<i class="fas fa-chevron-left"></i><span>%title</span>' ); ?>

			<?php next_post_link( '<div class="next-post col-12 col-md-4 col-lg-4 col-xl-4 py-3">%link</div>', '<span>%title</span><i class="fas fa-chevron-right"></i>' ); ?>

		</div>
	</nav>

</article><!-- #post-<?php the_ID(); ?> -->
