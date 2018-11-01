<?php
/**
 * Functions for showing related post, currated based on tags.
 *
 * @package Milors
 */
    
if ( ! function_exists( 'milors_related_post' ) ) {

    function milors_related_post($args = array()) {
        global $post;

        // default args
        $args = wp_parse_args($args, array(
            'post_id' => !empty($post) ? $post->ID : '',
            'taxonomy' => 'category',
            'limit' => 3,
            'post_type' => !empty($post) ? $post->post_type : 'post',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        // check taxonomy
        if ( ! taxonomy_exists($args['taxonomy'])) {
            return;
        }

        // post taxonomies
        $taxonomies  = wp_get_post_terms($args['post_id'], $args['taxonomy'], array('fields' => 'ids'));

        if (empty($taxonomies)) {
            return;
        }
      
        $related_posts = get_posts(array(
            'post__not_in' => (array) $args['post_id'],
            'post_type' => $args['post_type'],
            'tax_query' => array(
                array(
                    'taxonomy' => $args['taxonomy'],
                    'field' => 'term_id',
                    'terms' => $taxonomies
                ),
            ),
            'posts_per_page' => $args['limit'],
            'orderby' => $args['orderby'],
            'order' => $args['order']    
        )); 

        if (!empty($related_posts)) { ?>
            <div class="related-post">
                <h2 class="widget-title py-3"><?php _e('Related articles', 'milors'); ?></h2>

                    
                        <?php
                        foreach ($related_posts as $post) {
                            setup_postdata($post);
                        ?>
                        <div class="recent-posts">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-square', false, '' ); ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                <img src="<?php echo $img[0]; ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                            </a>
                        </div>

                        <div class="d-flex align-content-center flex-wrap col-md-6 col-sm-6 col-12">
                            <div class="content">
                                
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

                        </div>
                </div>

                        <?php } ?>
                    
                    
                
            </div>
        <?php
        }

        wp_reset_postdata();
    }
}