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
    $_blogtitleOne = $krocks_opt['_blogtitleOne'];
    $_categ = $krocks_opt['_blogcontentOne'];
    $_column = $krocks_opt['_blogOnecolumn'];
    $_postStyle = $krocks_opt['_postStyle'];
    $_categShow = $krocks_opt['_categShow'];
?>

    <!-- Block One -->
    <div class="blog-style-two what-news py-5">
        <div class="container py-5">
            <div class="row">
              <div class="col-6 col-md-6 col-sm-12 pb-3">
                <h1 class="section-title"><?php echo esc_html($_blogtitleOne); ?></h1>
              </div>
            </div>

            <div class="row">
                <?php if ($_column == 'col-lg-8') : ?>
                    <div class="col-lg-8 col-md-6 col-sm-12 col-12 wn-recent-post-column">
                        <?php if ( have_posts() ) : ?>
                        <?php 
                            $args = array('cat' => $_categ);
                            $query = new WP_Query($args);
                            while ( $query->have_posts() ) : $query->the_post(); 
                        ?>

                        <div class="recent-posts mb-5">
                            <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'small-height-fixed', false, '' ); ?>
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

                                <?php the_content(); ?>

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
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                
                    <div class="col-md-4 col-sm-12 col-12 sidebar">
                        <?php get_sidebar(); ?>
                    </div>
            
                <?php else : ?>

                    <?php if ( have_posts() ) : ?>
                        <?php 
                            $args = array('cat' => $_categ);
                            $query = new WP_Query($args);
                            while ( $query->have_posts() ) : $query->the_post(); 
                        ?>
                    <div class="<?php echo $_column; ?> col-md-6 col-sm-12 col-12 wn-recent-post-column">
                        <div class="recent-posts">
                            <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'small-height-fixed', false, '' ); ?>
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

                                <?php the_content(); ?>

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
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                
                <?php endif; ?>
                        
            </div><!-- row-->
        </div><!-- container -->
    </div><!-- block one -->