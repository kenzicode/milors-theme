<?php
/**
 * Template part for displaying content block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Milors Theme
 */

?>

<?php 
    global $krocks_opt;
    $_blogtitleTwo = $krocks_opt['_blogtitleTwo'];
    $_categ = $krocks_opt['_blogcontentTwo'];
    $_column = $krocks_opt['_blogTwocolumn'];
?>

    <!-- Block Two -->
    <div class="blog-style-four traveller py-5">
        <div class="container py-5">
            <div class="row">
              <div class="col-6 col-md-6 col-sm-12 pb-3">
                <h1 class="section-title"><?php echo $_blogtitleTwo; ?></h1>
              </div>
            </div>

            <div class="row">
                <?php if ( have_posts() ) : ?>
                    <?php 
                        $args = array('cat' => $_categ);
                        $query = new WP_Query($args);
                        while ( $query->have_posts() ) : $query->the_post(); 
                    ?>
                <div class="<?php echo $_column; ?> col-md-6 col-sm-12 col-12 wn-recent-post-column">
                    <div class="recent-posts">
                        <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-square', false, '' ); ?>
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <img src="<?php echo $img[0]; ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                        </a>
                        <div class="content">
                      
                            <span class="post-category">
                                <?php the_category() ?>
                            </span>
                                    
                            <h4 class="entry-title pt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                  
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>