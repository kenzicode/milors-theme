<?php /* Metabox */
add_action( 'cmb2_admin_init', 'post_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function post_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_milors_';

	/**
	 * Initiate the metabox Post
	 */
	$cmbPost = new_cmb2_box( array(
		'id'            => 'post_metabox',
		'title'         => __( 'Post Options', 'cmb2' ),
		'object_types'  => array( 'post', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmbPost->add_field( array(
		'name'             => esc_html__( 'Sidebar', 'cmb2' ),
		'desc'             => esc_html__( 'Choose layout', 'cmb2' ),
		'id'               => $prefix . 'sidebar',
		'type'             => 'radio_inline',
		'options'          => array(
			'noSidebar' => esc_html__( 'No Sidebar', 'cmb2' ),
			'leftSidebar'   => esc_html__( 'Left Sidebar', 'cmb2' ),
			'rightSidebar'     => esc_html__( 'Right Sidebar', 'cmb2' ),
		),
		'default' 			=> 'rightSidebar'
	) );

	$cmbPost->add_field( array(
		'name'             => esc_html__( 'Post Header Style', 'cmb2' ),
		'desc'             => esc_html__( 'Select Single Post Header Layout', 'cmb2' ),
		'id'               => $prefix . 'single_post_header',
		'type'             => 'radio_inline',
		'options'          => array(
			'leftHeader' => esc_html__( 'Left Header', 'cmb2' ),
			'regularHeader' => esc_html__( 'Regular', 'cmb2' ),
			'bigimgHeader' => esc_html__('Big Featured Image', 'cmb2'),
			'bigimgwithtitleHeader' => esc_html__('Big Featured Image with Title', 'cmb2'),
		),
		'default' => 'regularHeader'
	) );

	$cmbPost->add_field( array(
		'name' => 'Test Title',
		'desc' => 'This is a title description',
		'type' => 'text',
		'id'   => 'test_title'
	) );
	
	$cmbPost->add_field( array(
		'name' => 'Next or Previous Post',
		'desc' => 'Checked to Show This Feature',
		'id'   => $prefix . 'nexprev_post',
		'type' => 'checkbox',
	) );

	$cmbPost->add_field( array(
		'name' => 'Related Post',
		'desc' => 'Checked to Show Post',
		'id'   => $prefix . 'related_post',
		'type' => 'checkbox',
	) );

	$cmbPost->add_field( array(
		'name' => 'Sharing',
		'desc' => 'Checked to Show Sharing Button',
		'id'   => $prefix . 'share',
		'type' => 'checkbox',
	) );
	
	$cmbPost->add_field( array(
		'name' => 'Comment',
		'desc' => 'Checked to Show Comment',
		'id'   => $prefix . 'comment_post',
		'type' => 'checkbox',
	) );

	$cmbPost->add_field( array(
		'name' => 'Author',
		'desc' => 'Checked to Show Author Info',
		'id'   => $prefix . 'author',
		'type' => 'checkbox',
	) );


	$cmbPost->add_field( array(
		'name'    => 'Header Image',
		'desc'    => 'Upload an image or enter an URL.',
		'id'      => '_headerImg',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
		),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );

	$cmbPost->add_field( array(
		'name'    => 'Project Images',
		'desc'    => 'Upload an image for slider',
		'id'      => '_sliderImg',
		'type'    => 'file_list',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text' => array(
			'add_upload_files_text' => 'Add Image', // default: "Add or Upload Files"
			'remove_image_text' => 'Remove', // default: "Remove Image"
			'file_text' => 'Image', // default: "File:"
		),
	) );

	// Add other metaboxes as needed

	/**
	 * Initiate the metabox Post
	 */
	$cmbPage = new_cmb2_box( array(
		'id'            => 'page_metabox',
		'title'         => __( 'Page Options', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmbPage->add_field( array(
		'name'             => esc_html__( 'Sidebar', 'cmb2' ),
		'desc'             => esc_html__( 'Choose layout', 'cmb2' ),
		'id'               => $prefix . 'sidebarpage',
		'type'             => 'radio_inline',
		'options'          => array(
			'noSidebar' => esc_html__( 'No Sidebar', 'cmb2' ),
			'leftSidebar'   => esc_html__( 'Left Sidebar', 'cmb2' ),
			'rightSidebar'     => esc_html__( 'Right Sidebar', 'cmb2' ),
		),
		'default' 			=> 'rightSidebar'
	) );
}
?>