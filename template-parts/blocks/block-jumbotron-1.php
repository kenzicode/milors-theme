<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dam_Theme
 */

?>

<!-- BLOG SECTION-->
        <section class="padding-top-bottom-120px white-background animation-overflow">
            <div class="container">
                <div class="row">
                    <div class="animatedParent animateOnce">
                        <h3 class="head-h3">
                            <?php 
                                global $krocks_opt;
                                echo $krocks_opt['_blogtitle'];
                            ?>
                        </h3>
                        <p class="head-subtitle">
                            <?php 
                                global $krocks_opt;
                                echo $krocks_opt['_blogtext'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- BLOG LISTING THREE COLUMNS -->
            <div class="container-fluid">
                <div class="row">
                    <div class="blog-page-listing animatedParent animateOnce">

                        <?php 
                            global $krocks_opt;
                            $blogColumn = $krocks_opt['_blogcolumn'];
                        ?>

                        <?php if($blogColumn == '1') { ?>

                        <?php if ( have_posts() ) : ?>
                        
                        <?php 
                            global $krocks_opt;
                            $show_post = $krocks_opt['_blogcontent'];
                            $the_query = new WP_Query("category=$show_post");   
                            while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID; 
                        ?>

                        <div class="col-sm-6 col-md-4">
                            <article id="post-<?php the_ID(); ?>">
                                <div class="blog-page-post-wrapp animated">
                                    <?php $bimg =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullimg', false, '' ); ?>

                                    <img class="blog-page-post-img" src="<?php echo $bimg[0]; ?>" alt="<?php the_title_attribute(); ?>"/>

                                    <h2 class="blog-page-post-head-h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                                    <ul class="blog_post_category">
                                        <li><i class="fa fa-thumb-tack"></i></li>
                                        <li><?php the_category(', ') ?></li> 
                                    </ul>
                                    <ul class="blog_post_tags">
            
                                        <?php
                                            $posttags = get_the_tags();
                                                if ($posttags) {
                                                    echo '<li><i class="fa fa-tags"></i></li>';
                                                    foreach($posttags as $tag) {
                                                        echo '<li><a>'. $tag->name . '</a></li>'; 
                                                    }
                                                }
                                        ?>

                                    </ul>
                                    <div class="blog-page-post-content">
                                        <?php wpe_excerpt('wpe_excerptlength_index_sc', ''); ?>
                                       
                                    </div>
                                    <div class="blog-page-post-author">
                                        <a href="#author-link">
                                            <?php echo get_the_author(); ?>
                                        </a>
                                    </div>
                                    <div class="blog-page-post-date">
                                        <a href="#published"><?php the_time("M j, Y");?></a>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <?php endwhile; ?>
                        <?php endif; // end have_posts() check ?>

                        <?php } else {  ?>

                        <?php if ( have_posts() ) : ?>
                        
                        <?php 
                            global $krocks_opt;
                            $show_post = $krocks_opt['_blogcontent'];
                            $the_query = new WP_Query("showposts=$show_post");  
                            while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID; 
                        ?>

                        <div class="col-sm-6 col-md-3">
                            <article id="post-<?php the_ID(); ?>">
                                <div class="blog-page-post-wrapp animated">
                                    <?php $bimg =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullimg', false, '' ); ?>

                                    <img class="blog-page-post-img" src="<?php echo $bimg[0]; ?>" alt="<?php the_title_attribute(); ?>"/>

                                    <h2 class="blog-page-post-head-h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                                    <ul class="blog_post_category">
                                        <li><i class="fa fa-thumb-tack"></i></li>
                                        <li><?php the_category(', ') ?></li> 
                                    </ul>
                                    <ul class="blog_post_tags">
            
                                        <?php
                                            $posttags = get_the_tags();
                                                if ($posttags) {
                                                    echo '<li><i class="fa fa-tags"></i></li>';
                                                    foreach($posttags as $tag) {
                                                        echo '<li><a>'. $tag->name . '</a></li>'; 
                                                    }
                                                }
                                        ?>

                                    </ul>
                                    <div class="blog-page-post-content">
                                        <?php wpe_excerpt('wpe_excerptlength_index_sc', ''); ?>
                                       
                                    </div>
                                    <div class="blog-page-post-author">
                                        <a href="#author-link">
                                            <?php echo get_the_author(); ?>
                                        </a>
                                    </div>
                                    <div class="blog-page-post-date">
                                        <a href="#published"><?php the_time("M j, Y");?></a>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <?php endwhile; ?>
                        <?php endif; // end have_posts() check ?>

                        <?php }; ?>

                    </div>
                </div>
            </div>
        </section>