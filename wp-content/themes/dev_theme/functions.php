<?php
/**
 * @package WordPress
 * @subpackage TGB_Development_Theme
**/

// Add featured image to posts
add_theme_support('post-thumbnails');

// Defines the Excerpt
function new_excerpt_length($length) {
	return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Gives the excerpt a Read More link
function new_excerpt_more($more) {
  global $post;
  return '<a class="read-more" href="'. get_permalink($post->ID) . '">Read More </a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//  Adds Custom menu ability
add_action('init', 'register_custom_menu');

// Allow users to add their own Menu
function register_custom_menu() {
    register_nav_menu('custom_menu', __('Custom Menu'));
}

// Dynamic Widgetized Sidebars
if (function_exists('register_sidebar')) {
   widgets_array(); 
}

function widgets_array()
{
	$widgetized_areas = array(
		'Sidebar' => array(
      'admin_menu_order'  => 100,
			'args' => array (
				'name'          => 'Sidebar',
				'id'            => 'sidebar-widget',
        'description'   => 'What ya put here will show up in your sidebar.',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
				'before_widget' => '',
				'after_widget'  => '',
      ),
    ),
    'Custom' => array(
      'admin_menu_order'  => 200,
      'args' => array(
        'name'          => 'Custom',
        'id'            => 'custom-sidebar',
        'description'   => 'Sidebar for a custom page.',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
        'before_widget' => '',
        'after_widget'  => '',
      )
    )
  );

	return apply_filters('widgetized_areas', $widgetized_areas);
}

$widgetized_areas = widgets_array();

if ( !function_exists('register_sidebars') )
    return;

foreach ($widgetized_areas as $key => $value) {
    register_sidebar($widgetized_areas[$key]['args']);
}

/* clean up wp-head */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

remove_filter('the_content', 'wptexturize');
remove_filter('comment_text', 'wptexturize');

// show admin bar only for admins
if (!current_user_can('manage_options')) {
  add_filter('show_admin_bar', '__return_false');
}

/*/////////////////////////////////////////////////////////////////////*/
/* ///////////////       CUSTOM SLIDESHOW      ////////////////////////*/
/*/////////////////////////////////////////////////////////////////////*/

//  create the custom post type
function post_type_slideshow()
{
  $labels = array(
    'name' => __('Slideshow'),
    'singular_name' => __('Slideshow'),
    'add_new' => __('Add New Slide'),
    'add_new_item' => __('Add New Slide'),
    'new_item' => __('Add New Slide'),
    'edit_item' => __('Edit Slide'),
    'view_item' => __('View Slide'),
    'search_items' => __('Search Slides')
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array('title')
  );

  register_post_type('post_type_slideshow',$args);
}
add_action('init', 'post_type_slideshow');


// Add custom Meta Boxes
add_action( 'add_meta_boxes', 'slideshow_add_custom_box' );
add_action( 'save_post', 'slideshow_save_postdata' );

function slideshow_add_custom_box() {
  add_meta_box(
    'slideshow_options',
    'Slide Options',
    'slideshow_inner_custom_box',
    'post_type_slideshow'
  );
}

function slideshow_inner_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'slideshow_noncename' );

  $mydata = get_post_meta($post->ID, 'slideshow_slider', TRUE);

  // The actual fields for data entry
  echo '<label style="margin-top: 5px;float:left;width:100px" for="slideshow_imageurl">URL To:</label>';
  echo '<input type="text" id="slideshow_imageurl" name="slideshow_imageurl" value="'.$mydata['slideshow_imageurl'].'" size="60" /><br />';

  echo '<label style="margin-top: 5px;float:left;width:100px" for="slideshow_headline">Headline:</label>';
  echo '<input type="text" id="slideshow_headline" name="slideshow_headline" value="'.$mydata['slideshow_headline'].'" size="60" /><br />';
 
  echo '<label style="margin-top: 5px;float:left;width:100px" for="slideshow_copy">Copy:</label>';
  echo '<textarea id="slideshow_copy" name="slideshow_copy" cols="61" rows="4">'.$mydata['slideshow_copy'].'</textarea>';
}

function slideshow_save_postdata( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;

  if ( !wp_verify_nonce( $_POST['slideshow_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  if ( !current_user_can( 'edit_post', $post_id ) )
        return;

  $mydata = array();
  foreach($_POST as $key => $data) {
    if($key == 'slideshow_noncename')
      continue;
    if(preg_match('/^slideshow/i', $key)) {
      $mydata[$key] = $data;
    }
  }
  update_post_meta($post_id, 'slideshow_slider', $mydata);
  return $mydata;
}

$prefix = 'sic_';
 
/* Create the meta box for the image (with browse button) */
$meta_box = array(
	'id' => 'my-meta-box',
	'title' => 'Slide Image',
	'page' => 'post_type_slideshow',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Image',
			'id' => 'upload_image',
			'type' => 'text',
			'std' => ''
		),
    array(
			'name' => '',
			'id' => 'upload_image_button',
			'type' => 'button',
			'std' => 'Browse'
		),
	)
);
 
add_action('admin_menu', 'mytheme_add_box');
 
// Add meta box
function mytheme_add_box() {
	global $meta_box;
 
	add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}
 
// Callback function to show fields in meta box
function mytheme_show_box() {
	global $meta_box, $post;
 
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
 

		echo '<tr>',
				'<th style="width:13%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
		switch ($field['type']) {
 
    //If Text		
    case 'text':
      echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
        '<br />', $field['desc'];
      break;
 
 
    //If Text Area			
    case 'textarea':
      echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
        '<br />', $field['desc'];
      break;
 
 
    //If Button	
    case 'button':
      echo '<input type="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
      break;
		}
		echo 	'<td>',
			'</tr>';
	}
	echo '</table>';
}
 
add_action('save_post', 'mytheme_save_data');


// Save data from meta box
function mytheme_save_data($post_id) {
	global $meta_box;
 
	// verify nonce
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
 

// call in thickbox and other dependencies
function my_admin_scripts() {
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  wp_register_script('my-upload', get_bloginfo('template_url') . '/functions/my-script.js', array('jquery','media-upload','thickbox'));
  wp_enqueue_script('my-upload');
}
function my_admin_styles() {
  wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');


/* Add Comment Counter to the dashboard */
/*
function comment_counter() {
	echo '<iframe width="100%" height="250" src="'.site_url().'/comment-count"></iframe>';
}
function add_comment_counter() {
	wp_add_dashboard_widget('comment_counter', 'Comment Counts', 'comment_counter');
}
add_action('wp_dashboard_setup', 'add_comment_counter');
*/
?>
