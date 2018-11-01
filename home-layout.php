<?php
/*
 Template Name: Home Layout
 */

get_header(); ?>

<?php	
	global $krocks_opt;
	$layout = $krocks_opt['_homeblocks']['enabled'];
	 
	if ($layout): foreach ($layout as $key=>$value) {
	 
	    switch($key) {
	 		
	 		case '_featuredPost': get_template_part( 'template-parts/blocks/block', 'featuredPost' );
	 		break;

	 		case '_blockOne': get_template_part( 'template-parts/blocks/block', 'blockOne' );
	 		break;

	 		case '_blockTwo': get_template_part( 'template-parts/blocks/block', 'blockTwo' );
	 		break;

	 		case '_blockThree': get_template_part( 'template-parts/blocks/block', 'blockThree' );
	 		break;

	 		case '_blockFour': get_template_part( 'template-parts/blocks/block', 'blockFour' );
	 		break;

	 		case '_blockFive': get_template_part( 'template-parts/blocks/block', 'blockFive' );
	 		break;
	    }
	 
	}
	 
	endif;
?>


<?php get_footer(); ?>