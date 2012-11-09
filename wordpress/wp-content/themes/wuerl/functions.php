<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');						// core functions (don't remove)
require_once('library/plugins.php');					// plugins & extra functions (optional)

// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpbs-featured', 638, 300, true );
add_image_size( 'wpbs-featured-home', 970, 311, true);
add_image_size( 'wpbs-featured-carousel', 970, 400, true);
add_image_size( 'bones-thumb-600', 600, 150, false );
add_image_size( 'bones-thumb-300', 300, 100, true );
/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
		register_sidebar(array(
			'id' => 'sidebar1',
			'name' => 'Main Sidebar',
			'description' => 'Used on every page BUT the homepage page template.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		register_sidebar(array(
			'id' => 'footer1',
			'name' => 'Footer 1',
			'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));

		register_sidebar(array(
			'id' => 'footer2',
			'name' => 'Footer 2',
			'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));

		register_sidebar(array(
			'id' => 'footer3',
			'name' => 'Footer 3',
			'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		
		/* 
		to add more sidebars or widgetized areas, just copy
		and edit the above sidebar code. In order to call 
		your new sidebar just use the following code:
		
		Just change the name to whatever your new
		sidebar's id is, for example:
		
		
		
		To call the sidebar in your template, you can just copy
		the sidebar.php file and rename it to your sidebar's name.
		So using the above example, it would be:
		sidebar-sidebar2.php
		
		*/
} // don't remove this bracket!

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Disable jump in 'read more' link
function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
}

// Add thumbnail class to thumbnail links
function add_class_attachment_link($html){
		$postid = get_the_ID();
		$html = str_replace('<a','<a class="thumbnail"',$html);
		return $html;
}
add_filter('wp_get_attachment_link','add_class_attachment_link',10,1);

// Add lead class to first paragraph
/*
function first_paragraph($content){
		global $post;

		// if we're on the homepage, don't add the lead class to the first paragraph of text
		if( is_page_template( 'page-nolead.php' ) )
				return $content;
		else
				return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter('the_content', 'first_paragraph');
*/

// Menu output mods
class description_walker extends Walker_Nav_Menu
{
			function start_el(&$output, $item, $depth, $args)
			{
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
			
			// If the item has children, add the dropdown class for bootstrap
			if ( $args->has_children ) {
				$class_names = "dropdown ";
			}
			
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';
					 
					 	$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

					 	$attributes	 = ! empty( $item->attr_title ) ? ' title="'	. esc_attr( $item->attr_title ) .'"' : '';
					 	$attributes .= ! empty( $item->target )			? ' target="' . esc_attr( $item->target			) .'"' : '';
					 	$attributes .= ! empty( $item->xfn )				? ' rel="'		. esc_attr( $item->xfn				) .'"' : '';
					 	$attributes .= ! empty( $item->url )				? ' href="'		. esc_attr( $item->url				) .'"' : '';
					 	// if the item has children add these two attributes to the anchor tag
					 	if ( $args->has_children ) {
				$attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
			}

						$item_output = $args->before;
						$item_output .= '<a'. $attributes .'>';
						$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
						$item_output .= $args->link_after;
						// if the item has children add the caret just before closing the anchor tag
						if ( $args->has_children ) {
							$item_output .= '<b class="caret"></b></a>';
						}
						else{
							$item_output .= '</a>';
						}
						$item_output .= $args->after;

						$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
						}
						
				function start_lvl(&$output, $depth) {
						$indent = str_repeat("\t", $depth);
						$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
				}
						
				function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
						 {
								 $id_field = $this->db_fields['id'];
								 if ( is_object( $args[0] ) ) {
										 $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
								 }
								 return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
						 }
				
						
}

add_editor_style('editor-style.css');

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item

add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );
function add_active_class($classes, $item) {
	if($item->menu_item_parent == 0 && in_array('current-menu-item', $classes)) {
				$classes[] = "active";
	}
		return $classes;
}

// enqueue styles

function theme_styles()	 
{ 
		// This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/library/css/bootstrap.min.css', array(), '1.0', 'all' );
		wp_register_style( 'bootstrap-responsive', get_template_directory_uri() . '/library/css/bootstrap-responsive.min.css', array(), '1.0', 'all' );
		wp_register_style( 'fancybox', get_template_directory_uri() . '/library/css/jquery.fancybox.css', array(), '1.0', 'all' );
		wp_register_style( 'main', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
		
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'bootstrap-responsive' );
		wp_enqueue_style( 'fancybox' );
		wp_enqueue_style( 'main');
}
add_action('wp_enqueue_scripts', 'theme_styles');

// enqueue javascript

function theme_js(){

	wp_deregister_script('jquery'); // initiate the function	
/* 	wp_register_script('jquery', get_template_directory_uri().'/library/js/libs/jquery-1.7.1.min.js', false, '1.7.1'); */
/* 	Use Google jQuery */
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', false, '1.8.2');
	wp_register_script('jquery-easing', get_template_directory_uri().'/library/js/jquery.easing.1.3.js', array( 'jquery' ), '', true);
	wp_register_script('jquery-to-top', get_template_directory_uri().'/library/js/jquery.ui.totop.min-ck.js', array( 'jquery', 'jquery-easing' ), '', true );
	wp_register_script('jquery-fancybox', get_template_directory_uri().'/library/js/jquery.fancybox.pack.js', array( 'jquery' ), '', true);

	wp_register_script('bootstrap', get_template_directory_uri().'/library/js/bootstrap.min.js', array('jquery'), '2.2.1', true);
	wp_register_script('modernizr', get_template_directory_uri().'/library/js/modernizr.full.min.js', array('jquery'), '1.1', false);

	wp_register_script('main', get_template_directory_uri().'/scripts/js/main-ck.js', array('jquery', 'bootstrap', 'jquery-fancybox', 'jquery-to-top', 'jquery-easing'), '', true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-easing');
	wp_enqueue_script('jquery-fancybox');
	wp_enqueue_script('jquery-to-top');
	wp_enqueue_script('bootstrap');

	wp_enqueue_script('main');
	wp_enqueue_script('modernizr');
}
add_action('wp_enqueue_scripts', 'theme_js');

?>
