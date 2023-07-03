<?php
/**
 * @package Grunt_Functions
 * @version 1
 */
/*
Plugin Name: grunt functionality
Plugin URI: http://travisneel.com
Description: This is a functionality plugin that is used instead of placing the code in functions.php within the theme. This allows the functionality

to be used within other themes.
Author: Travis Neel
Version: 1
Author URI: http://travisneel.com
 */

function exhibitions_register()
{

    $labels = array(
        'name' => _x('Exhibitions', 'post type general name'),
        'singular_name' => _x('Exhibition Item', 'post type singular name'),
        'add_new' => _x('Add New', 'exhibition item'),
        'add_new_item' => __('Add New Exhibition Item'),
        'edit_item' => __('Edit Exhibition Item'),
        'new_item' => __('New Exhibition Item'),
        'view_item' => __('View Exhibition Item'),
        'search_items' => __('Search Exhibitions'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => '',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-art',
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'exhibitions'),
        'has_archive' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 3,
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('exhibition', $args);
}

add_action('init', 'exhibitions_register');

add_action('init', 'create_medium_taxonomies', 0);

function create_medium_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Medium', 'taxonomy general name'),
        'singular_name' => _x('Medium', 'taxonomy singular name'),
        'search_items' => __('Search Mediums'),
        'all_items' => __('All Mediuma'),
        'parent_item' => __('Parent Medium'),
        'parent_item_colon' => __('Parent Medium:'),
        'edit_item' => __('Edit Medium'),
        'update_item' => __('Update Medium'),
        'add_new_item' => __('Add New Medium'),
        'new_item_name' => __('New Medium Name'),
        'menu_name' => __('Medium'),
    );

    register_taxonomy('medium', array('exhibition'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'medium'),
    ));
}

add_action("admin_init", "admin_init");

function admin_init()
{
    //add_meta_box("year_completed-meta", "Year Completed", "year_completed", "exhibition", "side", "low");
    add_meta_box("credits_meta", "Exhibit Details", "credits_meta", "exhibition", "normal", "low");
    add_meta_box("credits_meta", "Event Details", "post_details_meta", "post", "normal", "low");
}

function post_details_meta()
{
    global $post;
    $custom = get_post_custom($post->ID);
    $event = $custom["event"][0];
    $eventdate = $custom["eventdate"][0];
    $eventlocation = $custom["eventlocation"][0];
    ?>
  <p><label>Event:</label><br />
  <textarea cols="50" rows="5" name="event"><?php echo $event; ?></textarea></p>
  <p><label>Date/Time:</label><br />
  <textarea cols="50" rows="5" name="eventdate"><?php echo $eventdate; ?></textarea></p>
  <p><label>Location:</label><br />
  <textarea cols="50" rows="5" name="eventlocation"><?php echo $eventlocation; ?></textarea></p>
  <?php
}

add_action('save_post', 'save_event_details');

function save_event_details($post_id)
{
    $meta_values = get_post_meta($post_id);

    update_post_meta($post_id, "event", $_POST["event"]);
    update_post_meta($post_id, "eventdate", $_POST["eventdate"]);
    update_post_meta($post_id, "eventlocation", $_POST["eventlocation"]);
}

/*
function year_completed(){
global $post;
$custom = get_post_custom($post->ID);
$year_completed = $custom["year_completed"][0];
?>
<label>Year:</label>
<input name="year_completed" value="<?php echo $year_completed; ?>" />
<?php
}*/

function credits_meta()
{
    global $post;

    if (!is_object($post)) {
        return;
    }

    $custom = get_post_custom($post->ID);
    $artist = $custom["artist"][0];
    $opening = $custom["opening"][0];
    $exhibitdates = $custom["exhibitdates"][0];
    ?>
  <p><label>Artist:</label><br />
  <textarea cols="50" rows="5" name="artist"><?php echo $artist; ?></textarea></p>
  <p><label>Opening:</label><br />
  <textarea cols="50" rows="5" name="opening"><?php echo $opening; ?></textarea></p>
  <p><label>Exhibition Dates:</label><br />
  <textarea cols="50" rows="5" name="exhibitdates"><?php echo $exhibitdates; ?></textarea></p>
  <?php
}

add_action('save_post', 'save_details');

function save_details()
{
    global $post;

    update_post_meta($post->ID, "artist", $_POST["artist"]);
    update_post_meta($post->ID, "opening", $_POST["opening"]);
    update_post_meta($post->ID, "exhibitdates", $_POST["exhibitdates"]);
}

add_action("manage_posts_custom_column", "exhibit_custom_columns");
add_filter("manage_edit-exhibition_columns", "exhibit_edit_columns");

function exhibit_edit_columns($columns)
{
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => "Exhibition Title",
        "artist" => "Artist",
        // "medium" => "Medium",
    );

    return $columns;
}
function exhibit_custom_columns($column)
{
    global $post;

    switch ($column) {
        case "description":
            the_excerpt();
            break;
        case "year":
            $custom = get_post_custom();
            echo $custom["artist"][0];
            break;
            //case "medium":
            //echo get_the_term_list($post->ID, 'Medium', '', ', ','');
            // break;
    }
}

// Add custom post types to feature a page widget

add_filter('fpw_post_types', 'fpw_add_post_type_to_feature');
function fpw_add_post_type_to_feature($post_types)
{
    $post_types[] = 'exhibition';
    return $post_types;
}

?>