<?php
/**
 * Milors Widget About
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Theme_Widget_About_Us extends WP_Widget {

	/**
	 * Sets up a new About widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget-aboutme text-center',
			'description' => __( 'Milors About Us Widget.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'theme_widget_about_us', __( 'Milors About' ), $widget_ops );
		$this->alt_option_name = 'widget_about';

		add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        add_action('admin_enqueue_styles', array($this, 'upload_styles'));

	}

	 /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', get_template_directory_uri() . '/_assets/js/widget-media.js');

    }

    /**
     * Add the styles for the upload media box
     */
    public function upload_styles()
    {
        wp_enqueue_style('thickbox');
    }


	/**
	 * Outputs the content for About widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'About Us' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */

		$image = ( ! empty( $instance['image'] ) ) ? $instance['image'] : '' ;


		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		// Profile description
        $text = (! empty( $instance['text'] ) ) ? $instance['text'] : _('description') ;

        

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filters the arguments for the About widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent posts.
		 * @param array $instance Array of settings for the current widget.
		 */
		
		
		echo $args['before_widget'];

		echo '<div class="aboutme">';

		if ( ! empty( $image ) ) {
			echo '<img src="'. esc_url($image) .'" class="aligncenter rounded-circle mb-3" width="150" heght="150" />';
		}

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( ! empty( $text ) ) {
			echo '<p>' . $text . '</p>';
		}		

		echo '</div>';

		$sosmed = 'n';
		if ((isset($instance['fb_url']) && !empty($instance['fb_url'])) ||
			(isset($instance['twitter_url']) && !empty($instance['twitter_url'])) ||
			(isset($instance['linkedin_url']) && !empty($instance['linkedin_url'])) ||
			(isset($instance['youtube_url']) && !empty($instance['youtube_url'])) ||
			(isset($instance['github_url']) && !empty($instance['github_url'])) ||
			(isset($instance['insta_url']) && !empty($instance['insta_url'])) ||
			(isset($instance['pinterest_url']) && !empty($instance['pinterest_url']))) {

			$sosmed = 'y';
		}

		if($sosmed === 'y') {
			echo '<div class="social-profiles"><ul>';
			// FB
			if(isset($instance['fb_url']) && !empty($instance['fb_url'])) {
				echo '<li><a href="'. esc_url($instance['fb_url']) .'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
			}
			// Twitter
			if(isset($instance['twitter_url']) && !empty($instance['twitter_url'])) {
				echo '<li><a href="'. esc_url($instance['twitter_url']) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
			}
			// Linkedin
			if(isset($instance['linkedin_url']) && !empty($instance['linkedin_url'])) {
				echo '<li><a href="'. esc_url($instance['linkedin_url']) .'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
			}
			// Youtube
			if(isset($instance['youtube_url']) && !empty($instance['youtube_url'])) {
				echo '<li><a href="'. esc_url($instance['youtube_url']) .'" target="_blank"><i class="fab fa-youtube"></i></a></li>';
			}
			// Github
			if(isset($instance['github_url']) && !empty($instance['github_url'])) {
				echo '<li><a href="'. esc_url($instance['github_url']) .'" target="_blank"><i class="fab fa-github"></i></a></li>';
			}
			// Insta
			if(isset($instance['insta_url']) && !empty($instance['insta_url'])) {
				echo '<li><a href="'. esc_url($instance['insta_url']) .'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
			}
			// Pinterest
			if(isset($instance['pinterest_url']) && !empty($instance['pinterest_url'])) {
				echo '<li><a href="'. esc_url($instance['pinterest_url']) .'" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>';
			}
			echo '</ul></div>';
		}

		?>
			
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the About widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$old_instance['image'] = isset ($new_instance['image']) ? $new_instance['image'] : '';

		$old_instance['title'] = isset ($new_instance['title']) ? strip_tags ($new_instance['title']) : '';

		$old_instance['text'] = isset ($new_instance['text']) ? strip_tags ($new_instance['text']) : '';

		$old_instance['fb_url'] = (isset ($new_instance['fb_url']) && (!empty($new_instance['fb_url']))) ? strip_tags ($new_instance['fb_url']) : '';

		$old_instance['twitter_url'] = (isset ($new_instance['twitter_url']) && (!empty($new_instance['twitter_url']))) ? strip_tags ($new_instance['twitter_url']) : '';

		$old_instance['linkedin_url'] = (isset ($new_instance['linkedin_url']) && (!empty($new_instance['linkedin_url']))) ? strip_tags ($new_instance['linkedin_url']) : '';

		$old_instance['youtube_url'] = (isset ($new_instance['youtube_url']) && (!empty($new_instance['youtube_url']))) ? strip_tags ($new_instance['youtube_url']) : '';

		$old_instance['github_url'] = (isset ($new_instance['github_url']) && (!empty($new_instance['github_url']))) ? strip_tags ($new_instance['github_url']) : '';

		$old_instance['insta_url'] = (isset ($new_instance['insta_url']) && (!empty($new_instance['insta_url']))) ? strip_tags ($new_instance['insta_url']) : '';

		$old_instance['pinterest_url'] = (isset ($new_instance['pinterest_url']) && (!empty($new_instance['pinterest_url']))) ? strip_tags ($new_instance['pinterest_url']) : '';


		$instance = apply_filters('save_profile_widget', $old_instance, $new_instance);

		return $instance;
	}

	/**
	 * Outputs the settings form for the About widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {

		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';

?>
		
        <p>
	      <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
	      <button class="upload_image_button button button-primary">Upload Image</button>
	   </p>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php if (isset ($instance['title'])) { echo esc_attr($instance['title']); } ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'About description:' ); ?></label>
		<textarea id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" class="widefat" rows="5" cols="5"><?php if (isset ($instance['text'])) { echo esc_attr($instance['text']); } ?></textarea></p>

		<p><label for="<php echo $this->get_field_id('fb_url'); ?>"><?php _e('Facebook url:','widget_about') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('fb_url'); ?>" name="<?php echo $this->get_field_name('fb_url'); ?>" value="<?php if (isset($instance['fb_url']) && !empty($instance['fb_url'])) { echo esc_attr($instance['fb_url']); } ?>" /></p>

		<p><label for="<php echo $this->get_field_id('twitter_url'); ?>"><?php _e('Twitter url:','widget_about') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>" value="<?php if (isset($instance['twitter_url']) && !empty($instance['twitter_url'])) { echo esc_attr($instance['twitter_url']); } ?>" /></p>

		<p><label for="<php echo $this->get_field_id('linkedin_url'); ?>"><?php _e('Linkedin url:','widget_about') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin_url'); ?>" name="<?php echo $this->get_field_name('linkedin_url'); ?>" value="<?php if (isset($instance['linkedin_url']) && !empty($instance['linkedin_url'])) { echo esc_attr($instance['linkedin_url']); } ?>" /></p>

		<p><label for="<php echo $this->get_field_id('youtube_url'); ?>"><?php _e('Youtube url:','widget_about') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('youtube_url'); ?>" name="<?php echo $this->get_field_name('youtube_url'); ?>" value="<?php if (isset($instance['youtube_url']) && !empty($instance['youtube_url'])) { echo esc_attr($instance['youtube_url']); } ?>" /></p>

		<p><label for="<php echo $this->get_field_id('github_url'); ?>"><?php _e('Github url:','widget_about') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('github_url'); ?>" name="<?php echo $this->get_field_name('github_url'); ?>" value="<?php if (isset($instance['github_url']) && !empty($instance['github_url'])) { echo esc_attr($instance['github_url']); } ?>" /></p>

		<p><label for="<php echo $this->get_field_id('insta_url'); ?>"><?php _e('Instagram url:','widget_about') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('insta_url'); ?>" name="<?php echo $this->get_field_name('insta_url'); ?>" value="<?php if (isset($instance['insta_url']) && !empty($instance['insta_url'])) { echo esc_attr($instance['insta_url']); } ?>" /></p>

		<p><label for="<php echo $this->get_field_id('pinterest_url'); ?>"><?php _e('Pinterest url:','widget_about') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('pinterest_url'); ?>" name="<?php echo $this->get_field_name('pinterest_url'); ?>" value="<?php if (isset($instance['pinterest_url']) && !empty($instance['pinterest_url'])) { echo esc_attr($instance['pinterest_url']); } ?>" /></p>


		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
<?php
	}

} 

	// register About widget
function register_Theme_Widget_About() {
    register_widget( 'Theme_Widget_About_Us' );
}
add_action( 'widgets_init', 'register_Theme_Widget_About' );
