<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Milors
 */

get_header();

global $krocks_opt;

$paged = get_query_var('paged');
query_posts('cat=-0&paged='.$paged);


$_homepageStyle_recentPost = $krocks_opt['_homepageStyle_recentPost'];
$_homepageStyle_recentPost_sidebar = $krocks_opt['_homepageStyle_recentPost_sidebar'];
$_homepageStyle_1_column = $krocks_opt['_homepageStyle_1_column'];
$_homepageStyle_2_column = $krocks_opt['_homepageStyle_2_column'];
$_postStyle = $krocks_opt['_postStyle'];
$_categShow = $krocks_opt['_categShow'];

?>

<?php 
	get_template_part( 'template-parts/blocks/block', 'featuredPost' );
?>

<?php if ( $_homepageStyle_recentPost == '2' ) : //Style 2 ?>

<div id="primary" class="content-area py-5">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<div class="row">
				<?php if ( $_homepageStyle_recentPost_sidebar == '1' ) : ?>
					<div class="col-lg-8 col-md-6 col-sm-12 col-12 wn-recent-post-column">
				<?php else : ?>
					<div class="col-lg-12 col-md-6 col-sm-12 col-12 wn-recent-post-column">
				<?php endif; ?>

				<?php
					if ( have_posts() ) :
                    while ( have_posts() ) : the_post();

                    $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-square', false, '' );
                ?>

                <div class="recent-posts">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                        	<a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                <img src="<?php echo $img[0]; ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                            </a>
                        </div>
                    
		                <div class="d-flex align-content-center flex-wrap col-md-6 col-sm-12 col-12">
		                    <div class="content">
		                    	
		                    	<?php if ($_categShow == '1') : ?>
                                    <span class="post-category">
                                        <?php the_category() ?>
                                    </span>
                                <?php endif; ?>

		                    	<h4 class="entry-title pt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

		                    	<?php if ( $_postStyle == '1' ) : ?>
		                    	<div class="entry-meta">
                                    <span class="author vcard">
                                        <span>By</span><?php echo get_the_author(); ?>
                                    </span>
                                    <span class="posted-on line">
                                        <span>On</span><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
                                    </span>
                                </div>
                            	<?php endif; ?>

		                    	<?php echo excerpt(25); ?>

		                    	<?php if ( $_postStyle !== '1' ) : ?>
	                            <div class="post-author">
	                                <div class="post-author-avatar">
	                                    <?php  
	                                        $user_id = get_the_author_meta('ID');
	                                        echo get_avatar( $user_id, 40 ); 
	                                    ?>
	                                </div>
	                                <div class="post-author-name">
	                                    <?php echo get_the_author(); ?>
	                                    <br>
	                                    <time class="entry-date" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
	                                </div>
	                            </div>
                        		<?php endif; ?>

		                    </div>
		                </div>
            		</div>
       	 		</div>

                <?php 
            	endwhile;
                 endif; ?>

                <?php krckts_pagination(); ?>

                </div><!-- col 8 -->

                <?php if ( $_homepageStyle_recentPost_sidebar == '1') : ?>
					<div class="col-md-4 col-sm-12 col-12 sidebar">
						<div class="pl-3">
	                    	<?php get_sidebar(); ?>
	                	</div>
	                </div>
            	<?php endif; ?>

			</div>
		</div>
	</main>
</div>

<?php else : // Style 1 ?>

<div id="primary" class="content-area py-5">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<div class="row">
				<?php if ( $_homepageStyle_recentPost_sidebar == '1' ) : ?>

					<div class="col-lg-8 col-md-6 col-sm-12 col-12 wn-recent-post-column">

				<?php else : ?>

					<div class="col-lg-12 col-md-6 col-sm-12 col-12 wn-recent-post-column">
				
				<?php endif; ?>

				<?php if ( $_homepageStyle_1_column !== '1' ) : ?>
					<div class="row">
				<?php endif; ?>

				<?php
					if ( have_posts() ) :
                    while ( have_posts() ) : the_post();

                    $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
                ?>

                <?php if ( $_homepageStyle_1_column !== '1' ) : ?>
                <div class="<?php echo $_homepageStyle_1_column; ?>">
                <?php endif; ?>
                    <div class="recent-posts mb-5">
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <img src="<?php echo $img[0]; ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                        </a>
                       	<div class="content">
                       		<?php if ($_categShow == '1') : ?>
                                <span class="post-category">
                                    <?php the_category() ?>
                                </span>
                            <?php endif; ?>
                       		<h4 class="entry-title pt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							
							<?php if ( $_postStyle == '1' ) : ?>                       		
	                       		<div class="entry-meta">
	                                <span class="author vcard">
	                                    <span>By</span><?php echo get_the_author(); ?>
	                                </span>
	                                <span class="posted-on line">
	                                	<span>On</span><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
	                                </span>
	                            </div>
                            <?php endif; ?>

                            <?php echo excerpt(25); ?>

                            <?php if ( $_postStyle !== '1' ) : ?>
	                            <div class="post-author">
	                                <div class="post-author-avatar">
	                                    <?php  
	                                        $user_id = get_the_author_meta('ID');
	                                        echo get_avatar( $user_id, 40 ); 
	                                    ?>
	                                </div>
	                                <div class="post-author-name">
	                                    <?php echo get_the_author(); ?>
	                                    <br>
	                                    <time class="entry-date" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
	                                </div>
	                            </div>
                        	<?php endif; ?>

                       	</div><!-- .content -->
                    </div><!-- .recent-posts -->
       			<?php if ( $_homepageStyle_1_column !== '1' ) : ?>
       			</div>
       			<?php endif; ?>
                
                	<?php 
                		endwhile;
						endif;
					?>

				<?php if ( $_homepageStyle_1_column !== '1' ) : ?>
					</div>
				<?php endif; ?>
				
				<?php krckts_pagination(); ?>

				</div>

				<?php if ( $_homepageStyle_recentPost_sidebar == '1') : ?>
					<div class="col-md-4 col-sm-12 col-12 sidebar">
						<div class="pl-3">
	                    	<?php get_sidebar(); ?>
	                	</div>
	                </div>
            	<?php endif; ?>

			</div><!-- .row -->
		</div><!-- .container -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php endif; ?>

<?php
//get_sidebar();
get_footer();
