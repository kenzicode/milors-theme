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



$_postStyle = $krocks_opt['_postStyle'];
$_categShow = $krocks_opt['_categShow'];

?>




<?php
	$img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-square', false, '' );
?>

<div class="recent-posts">
  <div class="row">
    <div class="col-md-6 col-sm-12 col-12">
      <a href="<?php the_permalink(); ?>" class="post-thumbnail">
        <img src="<?php echo $img[0]; ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid"
          style="border-radius: 5px 0 0 5px;">
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
            <span>On</span><time class="entry-date published"
              datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
          </span>
        </div>
        <?php endif; ?>

        <?php echo excerpt(20); ?>

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