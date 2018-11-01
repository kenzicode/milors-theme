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
    $_featuredPost_type = $krocks_opt['_featuredPost_type'];
    $_slide_q = $krocks_opt['_slides_qty'];
    $_slide_cat = $krocks_opt['_slide_categ'];
    $_slide_author = $krocks_opt['_slide_author'];
    $_post = $krocks_opt['_featuredPost'];
?>

<!-- <div class="home-feature py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <a href="#" class="xx">
                    <img src="https://www.mendo.nl/wp-content/uploads/2016/12/Mendo-2015-10-1-1200x0-c-default.jpg" class="img-fluid" alt="Photo of Neptune.">
                    <h4 class="entry-title py-2 h5 text-center">New Book by Millors</h4>        
                </a>
            </div>
            <div class="col">
                <a href="#" class="xx">
                    <img src="https://www.mendo.nl/wp-content/uploads/2016/12/Mendo-2015-10-1-1200x0-c-default.jpg" class="img-fluid" alt="Photo of Neptune.">
                    <h4 class="entry-title py-2 h5 text-center">New Book by Millors</h4>
                </a>
            </div>
            <div class="col">
                <a href="#" class="xx">
                    <img src="https://www.mendo.nl/wp-content/uploads/2016/12/Mendo-2015-10-1-1200x0-c-default.jpg" class="img-fluid" alt="Photo of Neptune.">
                    <h4 class="entry-title py-2 h5 text-center">New Book by Millors</h4>
                </a>
            </div>
        </div>
    </div>
</div>    
 -->
    <?php if ($_featuredPost_type == 'static') : ?>
    
    <!-- Featured post -->
    <div class="featured-post-static pt-5">

        <?php if ( have_posts() ) : ?>
        <?php 
            $args = array(
                'p' => $_post,
                'posts_per_page' => 1,
            );
            $query = new WP_Query($args);
            while ( $query->have_posts() ) : $query->the_post(); 
        ?>

        <div class="container pt-5">
            <div class="wrap no-gutters row">
                <div class="content-text d-flex align-content-center flex-wrap col-md-5 col-sm-12 col-12">
                    <h1 class="title-big"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <span class="tagging line"><?php the_category(); ?></span>
                
                    <p><?php echo excerpt(20); ?></p>

                    <div class="post-author">
                        <div class="post-author-avatar">
                            <?php  
                                $user_id = get_the_author_meta('ID');
                                echo get_avatar( $user_id, 35 ); 
                            ?>
                        </div>
                        <div class="post-author-name">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                <?php echo nl2br(get_the_author_meta('display_name')); ?>
                            </a>
                            
                            <br>
                            <time class="entry-date" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 featured-img col-sm-12 col-12">
                    <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-height-fixed', false, '' ); ?>

                    <img src="<?php echo $img[0]; ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <?php else : ?>




    <!-- Slides Posts -->
    <div class="featured-post-slider slider">
        <div class="flexslider carousel">
            <ul class="slides">
                <?php if ( have_posts() ) : 
                    $args = array(
                        'post_type' => 'post',
                        'post_per_page' => $_slide_q,
                        'cat' => $_slide_cat,
                        'author' => $_slide_author,
                    );
                    $query = new WP_Query($args);
                    while ( $query->have_posts() ) : $query->the_post();
                ?> 

                <li>
                    <div class="container py-5">
                        <div class="wrap no-gutters row">
                            <div class="content-text d-flex align-content-center flex-wrap col-md-5 col-sm-12 col-12">
                                <h1 class="title-slide"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <span class="tagging line"><?php the_category(); ?></span>
                                <?php the_content(); ?>
                                <div class="post-author">
                                    <div class="post-author-avatar">
                                        <?php  
                                            $user_id = get_the_author_meta('ID');
                                            echo get_avatar( $user_id, 35 ); 
                                        ?>
                                    </div>
                                    <div class="post-author-name">
                                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                            <?php echo nl2br(get_the_author_meta('display_name')); ?>
                                        </a>
                                        
                                        <br>
                                        <time class="entry-date" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-12">
                                <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-height-fixed', false, '' ); ?>

                                <img src="<?php echo $img[0]; ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
                            </div>
                        </div>
                    </div>
                </li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
    </div>

    <?php endif; ?>