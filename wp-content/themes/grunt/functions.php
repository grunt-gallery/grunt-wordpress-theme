<?php

// add exhibitions
include_once 'posttypes.php';

// Disable WordPress version reporting as a basic protection against attacks
function remove_generators() {
	return '';
}		

add_filter('the_generator','remove_generators');

// Add thumbnail support

add_theme_support( 'post-thumbnails' );

// Disable the admin bar, set to true if you want it to be visible.

show_admin_bar(TRUE);

// Shortcodes

include('shortcodes.php');

// Add theme support for Automatic Feed Links

add_theme_support( 'automatic-feed-links' );

// Custom Navigation

add_theme_support('nav-menus');

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  // - Header Navigation
		  'header-menu' => 'Header Navigation',
		)
	);
}

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  // - Footer Sitemap
		  'secondary' => __( 'Secondary Menu', 'grunt' ),
		  //'footer-menu' => 'Footer Sitemap',
		)
	);
}
// Sidebars

if (function_exists('register_sidebar')) {

	// Right Sidebar

	register_sidebar(array(
		'name'=> 'Right Sidebar',
		'id' => 'right_sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	
	// Header Widgets
	
	register_sidebar(array(
		'name'=> 'Header Widgets',
		'id' => 'header_widgets',
		'before_widget' => '<div id="header_widgets">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	// Footer Sidebar
	
	register_sidebar(array(
		'name'=> 'Footer Sidebar',
		'id' => 'footer_sidebar',
		'before_widget' => '<div id="%1$s" class="four columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	// Homepage Promo Left
	
	register_sidebar(array(
		'name'=> 'Homepage Promo Left',
		'id' => 'homepage_promo_left',
		'before_widget' => '<div id="%1$s" class="four columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	// Homepage Promo Center
	
	register_sidebar(array(
		'name'=> 'Homepage Promo Center',
		'id' => 'homepage_promo_center',
		'before_widget' => '<div id="%1$s" class="four columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	// Homepage Promo Right
	
	register_sidebar(array(
		'name'=> 'Homepage Promo Right',
		'id' => 'homepage_promo_right',
		'before_widget' => '<div id="%1$s" class="four columns %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

// Comments

// Custom callback to list pings

// Produces an avatar image with the hCard-compliant photo class

// Orbit, for WordPress

add_action('init', 'Orbit');

function Orbit(){
	$Orbit_args = array(
		'label'	=> __('Orbit'),
		'singular_label' =>	__('Orbit'),
		'public'	=>	true,
		'show_ui'	=>	true,
		'capability_type'	=>	'post',
		'hierarchical'	=>	false,
		'rewrite'	=>	true,
		'supports'	=>	array('title', 'editor','page-attributes','thumbnail')
		);
		register_post_type('Orbit', $Orbit_args);
}

function SliderContent(){

	$args = array( 'post_type' => 'Orbit');
	$loop = new WP_Query( $args );
	
		while ( $loop->have_posts() ) : $loop->the_post();
		
			if(has_post_thumbnail()) {
			
				the_post_thumbnail();
				
			} else {
			
				echo '<div class="content" style="background:#FFF;">';
			
					the_title();
					the_content();
					
				echo '</div>';
			
			}
		
		endwhile;
		
}



// Custom Pagination
/**
 * Retrieve or display pagination code.
 *
 * The defaults for overwriting are:
 * 'page' - Default is null (int). The current page. This function will
 *      automatically determine the value.
 * 'pages' - Default is null (int). The total number of pages. This function will
 *      automatically determine the value.
 * 'range' - Default is 3 (int). The number of page links to show before and after
 *      the current page.
 * 'gap' - Default is 3 (int). The minimum number of pages before a gap is 
 *      replaced with ellipses (...).
 * 'anchor' - Default is 1 (int). The number of links to always show at begining
 *      and end of pagination
 * 'before' - Default is '<div class="emm-paginate">' (string). The html or text 
 *      to add before the pagination links.
 * 'after' - Default is '</div>' (string). The html or text to add after the
 *      pagination links.
 * 'next_page' - Default is '__('&raquo;')' (string). The text to use for the 
 *      next page link.
 * 'previous_page' - Default is '__('&laquo')' (string). The text to use for the 
 *      previous page link.
 * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
 *      to 0 (zero).
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param array|string $args Optional. Override default arguments.
 * @return string HTML content, if not displaying.
 */
function emm_paginate($args = null) {
	$defaults = array(
		'page' => null, 'pages' => null, 
		'range' => 3, 'gap' => 3, 'anchor' => 1,
		'before' => '<ul class="pagination">', 'after' => '</ul>',
		'title' => __('<li class="unavailable"></li>'),
		'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
		'echo' => 1
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	if (!$page && !$pages) {
		global $wp_query;

		$page = get_query_var('paged');
		$page = !empty($page) ? intval($page) : 1;

		$posts_per_page = intval(get_query_var('posts_per_page'));
		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
	}
	
	$output = "";
	if ($pages > 1) {	
		$output .= "$before<li>$title</li>";
		$ellipsis = "<li class='unavailable'>...</li>";

		if ($page > 1 && !empty($previouspage)) {
			$output .= "<li><a href='" . get_pagenum_link($page - 1) . "'>$previouspage</a></li>";
		}
		
		$min_links = $range * 2 + 1;
		$block_min = min($page - $range, $pages - $min_links);
		$block_high = max($page + $range, $min_links);
		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

		if ($left_gap && !$right_gap) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $pages, $page)
			);
		}
		else if ($left_gap && $right_gap) {
			$output .= sprintf('%s%s%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $block_high, $page), 
				$ellipsis, 
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else if ($right_gap && !$left_gap) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else {
			$output .= emm_paginate_loop(1, $pages, $page);
		}

		if ($page < $pages && !empty($nextpage)) {
			$output .= "<li><a href='" . get_pagenum_link($page + 1) . "'>$nextpage</a></li>";
		}

		$output .= $after;
	}

	if ($echo) {
		echo $output;
	}

	return $output;
}

/**
 * Helper function for pagination which builds the page links.
 *
 * @access private
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param int $start The first link page.
 * @param int $max The last link page.
 * @return int $page Optional, default is 0. The current page.
 */
function emm_paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i)) 
			? "<li class='current'><a href='#'>$i</a></li>" 
			: "<li><a href='" . get_pagenum_link($i) . "'>$i</a></li>";
	}
	return $output;
} 

function custom_excerpt_length( $length ) {
	return 500;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Add category metabox to page
function add_categories_to_pages() {  
    register_taxonomy_for_object_type('category', 'page');  
    register_taxonomy_for_object_type('category', 'exhibition');  
}
add_action( 'init', 'add_categories_to_pages' );

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;

}
add_filter( 'body_class', 'add_slug_body_class' );

// Category to Body Class
  function add_category_to_single($classes) {
    if (is_single() ) {
      global $post;
      foreach((get_the_category($post->ID)) as $category) {
        // add category slug to the $classes array
        $classes[] = $category->category_nicename;
      }
    }
    // return the $classes array
    return $classes;
  }
add_filter('body_class','add_category_to_single');

add_shortcode( 'current_exhibit', 'display_custom_post_type' );

    function display_custom_post_type(){
        $args = array(
            'post_type' => 'exhibition',
            'post_status' => 'publish'
        );

        $string = '';
        $query = new WP_Query( $args );
        if( $query->have_posts() ){
            $string .= '<ul>';
            while( $query->have_posts() ){
                $query->the_post();
                $string .= '<li>' . get_the_title() . '</li>';
            }
            $string .= '</ul>';
        }
        wp_reset_postdata();
        return $string;
    }
// Front end only, don't hack on the settings page
if ( ! is_admin() ) {
    // Hook in early to modify the menu
    // This is before the CSS "selected" classes are calculated
    add_filter( 'wp_get_nav_menu_items', 'replace_placeholder_nav_menu_item_with_latest_post', 10, 3 );
}
 
// Replaces a custom URL placeholder with the URL to the latest post
function replace_placeholder_nav_menu_item_with_latest_post( $items, $menu, $args ) {
 
    // Loop through the menu items looking for placeholder(s)
    foreach ( $items as $item ) {
 
        // Is this the placeholder we're looking for?
        if ( '#latestpost' != $item->url )
            continue;
 
        // Get the latest post
        $latestpost = get_posts( array(
			'post_type' => 'exhibition',
            'numberposts' => 1,
			'category_name' => '_Current Exhibition'
        ) );
 
        if ( empty( $latestpost ) )
            continue;
 
        // Replace the placeholder with the real URL
        $item->url = get_permalink( $latestpost[0]->ID );
    }
 
    // Return the modified (or maybe unmodified) menu items array
    return $items;
}

// Add homepage widget area for main featured content

function grunthome_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home Feature',
		'id'            => 'home_feature',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'grunthome_widgets_init' );

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

?>