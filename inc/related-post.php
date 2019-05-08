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
            'limit' => 4,
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
            'posts_per_page' => 4,
            'orderby' => $args['orderby'],
            'order' => $args['order']    
        )); 

        if (!empty($related_posts)) { ?>
            <div class="related-post">
                <h2 class="widget-title py-3"><?php echo esc_html('Related articles', 'milors'); ?></h2>
                <div class="row">
                <?php
                    foreach ($related_posts as $post) {
                        setup_postdata($post);
                ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 wn-recent-post-column">
                        <div class="recent-posts">
                            <?php $img =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium-height-fixed', false, '' ); ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                <img src="<?php echo esc_url($img[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                            </a>

                            <div class="content">               
                                <h4 class="entry-title pt-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="entry-meta">
                                    <span class="author vcard">
                                        <i class="fas fa-user-alt"></i><?php echo get_the_author(); ?>
                                    </span>
                                    <span class="posted-on line">
                                        <i class="far fa-clock"></i><time class="entry-date published" datetime="<?php the_time("M j, Y");?>"><?php the_time("M j, Y");?></time>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                </div>
            </div>
        <?php
        }

        wp_reset_postdata();
    }
}