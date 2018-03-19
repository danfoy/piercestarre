<?php
/*
 *  Author: Dan Foy | @danfoyuk
 *  URL: https://www.danfoy.com
 *  Theme for Pierce Starre's website, based on his own design.
 */


/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width)) {
    $content_width = 900;
}

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true);
    add_image_size('medium', 250, '', true);
    add_image_size('small', 120, '', true);
    add_image_size('work-thumbnail', 180, 180, true);

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
    
}

// Enque stylesheet function
function enqueue_ps2017_stylesheets()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}

// Enqueue scripts (footer) function
function enqueue_ps2017_scripts()
{
    wp_register_script(
        'animate_menu',
        get_template_directory_uri() . '/js/animatemenu.js',
        array(),
        1,
        true
    );
    wp_register_script(
        'about_slider',
        get_template_directory_uri() . '/js/aboutslider.js',
        array(),
        1,
        true
    );
    // Animations disabled until a later release.
    // 
    // wp_register_script(
    //     'animate_about',
    //     get_template_directory_uri() . '/js/animateabout.js',
    //     array(),
    //     1,
    //     true
    // );
    wp_enqueue_script('animate_menu');
    if (is_page('about')) {
        // wp_enqueue_script('about_slider');
        wp_enqueue_script('animate_about');
    };
}



// Register header menu
function register_ps2017_menu()
{
    register_nav_menus(array(
        'sitenav' => ('Header Menu')
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
// Remove <p> tags on images
function filter_ptags_on_images($content)
{
    return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);
}

// Remove <p> tags on iFrames
function filter_ptags_on_iframes($content)
{
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
// Add HTML5 Blank Menu
add_action('init', 'register_ps2017_menu');
// Add our HTML5 Blank Custom Post Type
add_action('init', 'create_post_type_ps2017_portfolio');
// Remove inline Recent Comment Styles from wp_head()
add_action('widgets_init', 'my_remove_recent_comments_style');

// Enqueue Stylesheets
add_action('wp_enqueue_scripts', 'enqueue_ps2017_stylesheets');

// Enqueue Scripts
add_action('wp_enqueue_scripts', 'enqueue_ps2017_scripts');

// Remove Actions
// Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links_extra', 3);
// Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'feed_links', 2);
// Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'rsd_link');
// Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wlwmanifest_link');
// Index link
remove_action('wp_head', 'index_rel_link');
// Prev link
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
// Start link
remove_action('wp_head', 'start_post_rel_link', 10, 0);
// Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
// Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'wp_generator');

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
// Add slug to body class (Starkers build)
add_filter('body_class', 'add_slug_to_body_class');
// Remove surrounding <div> from WP Navigation
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args');
// Remove invalid rel attribute
add_filter('the_category', 'remove_category_rel_from_category_list');
// Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
// Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);
// Remove <p> tags from images
add_filter('the_content', 'filter_ptags_on_images');
// Remove <p> tags from iFrames
add_filter('the_content', 'filter_ptags_on_iframes');


/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_ps2017_portfolio()
{
    register_post_type('work', array(
        'labels' => array(
            'name' => ('Portfolio Items'),
            'singular_name' => ('Portfolio Item'),
            'add_new' => ('Add New Portfolio Item'),
            'add_new_item' => ('New Portfolio Item'),
            'edit' => ('Edit'),
            'edit_item' => ('Edit Portfolio Item'),
            'new_item' => ('New Portfolio Item'),
            'view' => ('View Portfolio Item'),
            'view_item' => ('View Portfolio Item'),
            'search_items' => ('Search Portfolio Item'),
            'not_found' => ('No Portfolio Items found'),
            'not_found_in_trash' => ('No Portfolio Items found in Trash'),
            'all_items' => ('All Portfolio Items'),
            'archives' => ('Portfolio Archive'),
            'attributes' => ('Portfolio Item Attributes'),
            'insert_into_item' => ('Insert Into Portfolio Item'),
            'uploaded_to_this_item' => ('Uploaded to this Portfolio Item'),
            'featured_image' => ('Portfolio Archive Thumbnail'),
            'set_featured_image' => ('Set Portfolio Archive Thumbnail'),
            'remove_featured_image' => ('Remove Portfolio Archive Thumbnail'),
            'use_featured_image' => ('Use As Portfolio Archive Thumbnail'),
        ),
        'public' => true,
        'hierarchical' => false,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
    ));
}
