<?php
/**
 * The template for displaying search forms 
 *
 * @package WordPress
 * @subpackage Milors
 * 
 */
?>
	<form class="form-search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input id="s" type="text" onfocus="if (this.value == 'Search...'){this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" name="s" value="Search..." />
		<input class="s-submit" type="image" alt="Submit" name="submit" src="<?php echo get_stylesheet_directory_uri(); ?>/images/search-icon.png">
	</form>
