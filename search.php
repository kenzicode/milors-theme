<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Milors
 */

get_header();
?>

<div class="blog-style-two what-news py-5">
        <div class="container py-5">
            <div class="row">
              <div class="col-6 col-md-6 col-sm-12 pb-3">
              	<h1 class="section-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search %s', 'milors-theme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
              </div>
            </div>

            <div class="row">

            	<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
	
					get_template_part( 'template-parts/content', 'grid' );

				endwhile; ?>


            	<!-- <div class="col-4 col-md-6 col-sm-12 col-12 wn-recent-post-column">
                    <div class="recent-posts">
                        <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'small-height-fixed', false, '' ); ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                <img src="<?php echo $img[0]; ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                            </a>
                        <div class="content">
                            <span class="post-category">
                                <?php the_category() ?>
                            </span>

                            <h4 class="entry-title pt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                            <div class="entry-meta">
                                <span class="author vcard">
                                    <span>By</span><?php echo get_the_author(); ?>
                                </span>
                                <span class="posted-on line">
                                    <span>On</span><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
                                </span>
                            </div>

                            <?php the_content(); ?>

                        </div>
                    </div>
                </div> -->
            </div><!-- .row -->
        </div>
</div>

<?php

get_footer();
