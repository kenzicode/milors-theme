<?php
/**
 * Functions for sharing button.
 *
 * @package Milors
 */
    
if ( ! function_exists( 'milors_share_button' ) ) {

    function milors_share_button() {

    global $post;

    $permalink = urlencode(get_permalink());
    $postTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
    $img =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fullsize', false, '' );
    $blogInfo = get_bloginfo('name');

    $img_echo = esc_url($img[0]);


    $twitterURL = 'https://twitter.com/intent/tweet?text='. $postTitle .'&amp;url='. $permalink .'&amp;via='. $blogInfo;

    $fbURL = 'https://www.facebook.com/sharer/sharer.php?u='. $permalink;

    $pinterest = 'https://pinterest.com/pin/create/button/?url='. $permalink .'&amp;media='. $img_echo .'&amp;description='. $postTitle;

    $mail = 'mailto:?subject='. $postTitle . '&amp;body='. $permalink;

    $shareButton =

	'<div class="sharebuttonSticky">
		<span class="share-text">Share</span>
		<div class="services"> 
			<a href="'. $fbURL .'" class="cf service facebook" target="_blank" title="Share on Facebook"> <i class="fab fa-facebook-f"></i>
			</a>

			<a href="'. $twitterURL .'" class="cf service twitter" target="_blank" title="Share on Twitter"> <i class="fab fa-twitter"></i>
			</a> 

			<a href="'. $pinterest .'" class="cf service pinterest" target="_blank" title="Pinterest"> <i class="fab fa-pinterest-p"></i>
			</a> 

			<a href="'. $mail .'" class="cf service email" target="_blank" title="Email"> <i class="far fa-envelope"></i>
			</a>
		</div>
	</div>';

	echo wp_kses_post( $shareButton );

    }
}
