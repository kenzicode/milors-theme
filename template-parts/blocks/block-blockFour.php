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
    $_blogtitleFour = $krocks_opt['_blogtitleFour'];
    $_categ = $krocks_opt['_blogcontentFour'];
    $_limit = $krocks_opt['_blogcontentFour_limit'];
    $_column = $krocks_opt['_blogFourcolumn'];
    $_categShow = $krocks_opt['_categShow'];
    $_postStyle = $krocks_opt['_postStyle'];
?>

    <!-- Block One -->
    <div class="blog-style-two what-news py-5">
        <div class="container py-5">
            <div class="row">
              <div class="col-6 col-md-6 col-sm-12 pb-3">
                <h1 class="section-title"><?php echo esc_html( $_blogtitleFour ); ?></h1>
              </div>
            </div>

            <div class="row">
                <div class="<?php echo $_column; ?> col-md-6 col-sm-12 col-12 wn-recent-post-column">
                    <?php 
                        $args = array(
                            'cat' => $_categ,
                            'showposts' => $_limit,
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts() ) : $i = 0;
                        while ( $query->have_posts() ) : $query->the_post();

                        if ($i == 0 ) : 
                    ?>
                    <!-- First Post -->
                    <div class="recent-posts mb-5">
                        <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large-height-fixed', false, '' ); ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                <img src="<?php echo esc_url($img[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                            </a>
                        <div class="content">
                            <?php if ($_categShow == '1') : ?>
                                <span class="post-category">
                                    <?php the_category() ?>
                                </span>
                            <?php endif; ?>

                             <?php if ($_postStyle == '1') : ?>

                                <h4 class="entry-title pt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                <div class="entry-meta">
                                    <span class="author vcard">
                                        <span>By</span><?php echo get_the_author(); ?>
                                    </span>
                                    <span class="posted-on line">
                                        <span>On</span><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
                                    </span>
                                </div>
                            
                            <?php else : ?>

                                <h4 class="entry-title py-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                            <?php endif; ?>

                            <?php the_excerpt(); ?>

                            <?php if ($_postStyle !== '1') : ?>
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

                    <?php if ($_column == 'col-lg-12') : ?>
                    <div class="row">
                    <?php endif; ?>

                    <?php endif; ?>

                    <?php 
                        if ($i != 0 ) :
                    ?>

                    <!-- Next Posts -->
                    <?php if ($_column == 'col-lg-12') : ?>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-5">
                    <?php endif; ?>

                        <div class="recent-posts">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-12">
                                    <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-square', false, '' ); ?>

                                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                        <img src="<?php echo esc_url($img[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                                    </a>
                                </div>
                                <div class="d-flex align-content-center flex-wrap col-md-6 col-sm-6 col-12">
                                    <div class="content-style-four">
                                        <h4 class="entry-title py-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php if ($_column == 'col-lg-12') : ?>
                    </div>
                    <?php endif; ?>
                    

                    <?php endif; ?>

                    <?php $i++; ?>

                <?php endwhile; ?>

                
                <?php if ($_column == 'col-lg-12') : ?>
                </div>
                <?php endif; ?>


                <?php
                    endif; ?>

                </div>
                
                <?php if ($_column == 'col-lg-8') : ?>
                    <div class="col-md-4 col-sm-12 col-12 sidebar">
                        <?php get_sidebar(); ?>
                    </div>
                <?php endif; ?>
                        
            </div><!-- row-->
        </div><!-- container -->
    </div><!-- block one -->