<?php

	if ( function_exists('register_sidebar') )
		register_sidebar( array(
			'name' => __( 'Footer First Widget', 'milors' ),
			'id' => 'footer-widget-1',
			'description' => __( 'The first footer widget', 'milors' ),
			'before_widget' => '<div id="%1$s" class="widget-container py-5 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	if ( function_exists('register_sidebar') )
		register_sidebar( array(
			'name' => __( 'Footer Second Widget', 'milors' ),
			'id' => 'footer-widget-2',
			'description' => __( 'The second footer widget', 'milors' ),
			'before_widget' => '<div id="%1$s" class="widget-container py-5 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	if ( function_exists('register_sidebar') )
		register_sidebar( array(
			'name' => __( 'Footer Third Widget', 'milors' ),
			'id' => 'footer-widget-3',
			'description' => __( 'The third footer widget area', 'milors' ),
			'before_widget' => '<div id="%1$s" class="widget-container py-5 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	if ( function_exists('register_sidebar') )
		register_sidebar( array(
			'name' => __( 'Footer Fourth Widget', 'milors' ),
			'id' => 'footer-widget-4',
			'description' => __( 'The fourth footer widget area', 'milors' ),
			'before_widget' => '<div id="%1$s" class="widget-container py-5 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
?>