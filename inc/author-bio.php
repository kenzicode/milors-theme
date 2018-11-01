<?php
/**
 * If a user has filled out their description, show a bio on their entries.
 *
 * @package Milors
 */
if ( ! function_exists( 'milors_author_bio' ) ) {

	function milors_author_bio() {

	if ( get_the_author_meta( 'description' ) ) { ?>
													
		<div class="single_author">					
			<div class="author-main row">
				<div class="author-img col-3 col-md-3 col-lg-3 col-sm-12">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size',150 ) ); ?>
				</div>
				<div class="author-desc col-9 col-md-9 col-lg-9 col-sm-12">
					<h3><?php printf( __( '%s', 'milors' ), get_the_author() ); ?></h3>	
					<p><?php the_author_meta( 'description' ); ?></p>
					<ul class="author_link">
						<?php 			
							$google_profile = get_the_author_meta( 'google_profile' );
							if ( $google_profile && $google_profile != '' ) {
								echo '<li class="google"><a href="' . esc_url($google_profile) . '" rel="author"><i class="fab fa-google-plus-g"></i></a></li>';
							}
							$twitter_profile = get_the_author_meta( 'twitter_profile' );
							if ( $twitter_profile && $twitter_profile != '' ) {
								echo '<li class="twitter"><a href="' . esc_url($twitter_profile) . '"><i class="fab fa-twitter"></i></a></li>';
							}			
							$facebook_profile = get_the_author_meta( 'facebook_profile' );
							if ( $facebook_profile && $facebook_profile != '' ) {
								echo '<li class="facebook"><a href="' . esc_url($facebook_profile) . '"><i class="fab fa-facebook-f"></i></a></li>';
							}						
							$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
							if ( $linkedin_profile && $linkedin_profile != '' ) {
							   echo '<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '"><i class="fab fa-linkedin-in"></i></a></li>';
							}
						?>
					</ul>
				</div>
			</div>
		</div>

		<?php }
	}
}