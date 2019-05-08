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
    $_blogtitleThree = $krocks_opt['_blogtitleThree'];
    $_categ = $krocks_opt['_blogcontentThree'];
    $_column = $krocks_opt['_blogThreecolumn'];
    $_postStyle = $krocks_opt['_postStyle'];
    $_categShow = $krocks_opt['_categShow'];
    $_postsQty = $krocks_opt['_blogThreePostQty'];
?>

    <!-- Block Three -->
    <div class="blog-style-five holiday py-5">
        <div class="container py-5">
            <div class="row">
              <div class="col-12 col-md-12 col-sm-12 pb-3">
                <h1 class="section-title"><?php echo esc_html( $_blogtitleThree ); ?></h1>
              </div>
            </div>

            <div class="row mt-4">
                <?php if ($_column == 'col-lg-8') : ?>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 mb-5">
                        <?php 
                            $args = array(
                                'posts_per_page' => 5,
                                'post_type' => 'post',
                                'cat' => $_categ,
                                'ignore_sticky_posts'=> true,
                            );
                            $myquery = new WP_Query($args);                    
                    
                            if ( $myquery->have_posts() ) :  
                            while ( $myquery->have_posts() ) : 
                            $myquery->the_post(); $do_not_duplicate = $post->ID; 
                        ?>
                            <div class="recent-posts mb-4">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-square', false, '' ); ?>

                                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                            <img src="<?php echo esc_url($img[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="d-flex align-content-center flex-wrap col-md-6 col-sm-6 col-12">
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
                                                        <i class="fas fa-user-alt"></i><?php echo get_the_author(); ?>
                                                    </span>
                                                    <span class="posted-on line">
                                                        <i class="far fa-clock"></i><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
                                                    </span>
                                                </div>
                                            
                                            <?php else : ?>

                                                <h4 class="entry-title py-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                            <?php endif; ?>

                                            <?php echo excerpt(25); ?>

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
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        
                        <div class="misha_loadmore">More posts</div>

                        </div>

                        <div class="col-md-4 col-sm-12 col-12 sidebar">
                            <?php get_sidebar(); ?>
                        </div> 

                <?php else : ?>
                    
                    <?php
                        $args = array(
                            'posts_per_page' => $_postsQty,
                            'post_type' => 'post',
                            'cat' => $_categ,
                            'ignore_sticky_posts'=> true,
                        );
                        $myquery = new WP_Query($args);                    
                
                        if ( $myquery->have_posts() ) :  
                        while ( $myquery->have_posts() ) : 
                        $myquery->the_post(); $do_not_duplicate = $post->ID; 
                    ?>

                    <div class="<?php echo $_column; ?> col-md-12 col-sm-12 col-12 my-3">
                        <div class="recent-posts">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-12">
                                    <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-square', false, '' ); ?>

                                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                        <img src="<?php echo esc_url($img[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                                    </a>
                                </div>
                                <div class="d-flex align-content-center flex-wrap col-md-6 col-sm-6 col-12">
                                    <div class="content">

                                        <?php if ($_categShow == '1') : ?>
                                            <span class="post-category">
                                                <?php the_category() ?>
                                            </span>
                                        <?php endif; ?>
                                        
                                        <?php if ($_postStyle == '1') : ?>
                                            
                                            <h4 class="entry-title pt-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                          
                                            <div class="entry-meta">
                                                <span class="author vcard">
                                                    <i class="fas fa-user-alt"></i><?php echo get_the_author(); ?>
                                                </span>
                                                <span class="posted-on line">
                                                    <i class="far fa-clock"></i><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
                                                </span>
                                            </div>

                                        <?php else : ?>

                                            <h4 class="entry-title py-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                        <?php endif; ?>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
                    <?php endif; ?>
                    
                </div>

                <?php endif; ?>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- block three -->