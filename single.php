<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Milors
 */
get_header();

global $post;

$author_id = $post->post_author;

$sidebar = get_post_meta( get_the_ID(), '_milors_sidebar', true ); 
$headerStyle = get_post_meta( get_the_ID(), '_milors_single_post_header', true );

?>
	
	<?php if ($headerStyle == 'bigimgwithtitleHeader') : ?>

			<div class="article-style-four mb-5">

				<div class="recent-posts">

				    <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large-height-fixed', false, '' ); ?>
					
					<?php if ( $img != '' ) : ?>
						
					<img src="<?php echo esc_url($img[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid mx-auto d-block">

					<div class="content">
	                      
	                    <span class="post-category">
	                        <?php the_category() ?>
	                    </span>
	                            
	                    <h1 class="entry-title pt-1"><?php the_title(); ?></h1>
	                   
	                    <div class="entry-meta">
				            <span class="author vcard">
				               	<span>By</span><?php echo nl2br(get_the_author_meta('display_name', $author_id)); ?>
				            </span>
				            <span class="posted-on line">
				                <span>On</span><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
				            </span>
				        </div>

	                </div>

	                <?php endif; ?>
				</div>
			</div>

	<?php endif; ?>
	
	<?php if ( $sidebar == 'no-sidebar' ) : ?>
		<div id="primary" class="no-sidebar container py-5">
	<?php else : ?>
		<div id="primary" class="container py-5">
	<?php endif; ?>

		<?php if ($headerStyle == 'bigimgHeader') : ?>
			<div class="post-media post-image mb-5">
		    	<?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large-height-fixed', false, '' ); ?>
			    <img src="<?php echo esc_url($img[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid img-fluid mx-auto d-block">
			</div>

		<?php elseif ($headerStyle == 'leftHeader') : ?>

			<div class="article-style-three pt-2 pb-5 mb-5">
	            <div class="wrap no-gutters row">
	                <div class="d-flex align-content-center flex-wrap col-md-5 col-sm-12 col-12 pr-5">
	                    <h1 class="entry-title"><?php the_title(); ?></h1>
	                    <span class="tagging line"><?php the_category(); ?></span>
	                   
	                    <p><?php echo excerpt(20); ?></p>

	                    <div class="post-author">
	                        <div class="post-author-avatar">
	                            <?php  
	                                $user_id = get_the_author_meta('ID', $author_id);
	                                echo get_avatar( $user_id, 35 ); 
	                            ?>
	                        </div>
	                        <div class="post-author-name">
	                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID',  $author_id ), get_the_author_meta( 'user_nicename', $author_id ) ); ?>">
	                                <?php echo nl2br(get_the_author_meta('display_name', $author_id)); ?>
	                            </a>
	                            
	                            <br>
	                            <time class="entry-date" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-7 col-sm-12 col-12">
	                    <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' ); ?>

	                    <img src="<?php echo esc_url($img[0]); ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
	                </div>
	            </div>
	        </div>

		<?php endif; ?>


		<div class="row">

			<?php if ( $sidebar === 'rightSidebar' ) { ?> 

			<div class="col-8 col-md-8 col-sm-12 pr-5">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					milors_author_bio();

					// calling related post function 
					milors_related_post(array(
						'taxonomy' => 'category',
						'limit' => 6
					)); 

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</div>

			<div class="col-4 col-md-4 col-sm-12 widgets-no-padding">
				<?php get_sidebar(); ?>
			</div>

			<?php } elseif ( $sidebar === 'leftSidebar' ) { ?>

			<div class="col-4 col-md-4 col-sm-12">
				<?php get_sidebar(); ?>
			</div>

			<div class="col-8 col-md-8 col-sm-12 pl-5">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					milors_author_bio();
					
					milors_related_post(array(
							'taxonomy' => 'post_tag',
							'limit' => 6
						));
					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</div>

			<?php } else { // No Sidebar?>

			<div class="col-12 col-md-12 col-sm-12 no-sidebar">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );
				?>

				<div class="no-sidebar single-post">
					<?php

						milors_author_bio();

						milors_related_post(array(
							'taxonomy' => 'category',
							'limit' => 6
						)); 

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					?>
				</div>

				<?php endwhile; // End of the loop.
					?>

			</div>

			<?php } ?>

		</div>

	</div><!-- #primary -->

<?php get_footer(); ?>
