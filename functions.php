<?php

function quickshop_files()
{
    wp_enqueue_script('jquery-1-11-0-js', get_theme_file_uri('/js/jquery-1.11.0.js'), NULL, '1.0', true);
    wp_enqueue_script('jquery-easing-min-js', get_theme_file_uri('/js/jquery.easing.min.js'), NULL, '1.0', true);
    wp_enqueue_script('bootstrap-min-js', get_theme_file_uri('/js/bootstrap.min.js'), NULL, '1.0', true);
    wp_enqueue_script('landing-page-js', get_theme_file_uri('/js/landing-page.js'), NULL, '1.0', true);

    wp_enqueue_style('bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('landing-page-css', get_template_directory_uri() . '/css/landing-page.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome-4.1.0/css/font-awesome.min.css');
    wp_enqueue_style('font-google', '//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic');
    wp_enqueue_style('quickshop_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'quickshop_files');

function quickshop_features()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'quickshop_features');

// Our custom post type function
// function create_posttype() {

//     register_post_type( 'movies',
//     // CPT Options
//         array(
//             'labels' => array(
//                 'name' => __( 'Movies' ),
//                 'singular_name' => __( 'Movie' )
//             ),
//             'public' => true,
//             'has_archive' => true,
//             'rewrite' => array('slug' => 'movies'),
//             'show_in_rest' => true,

//         )
//     );
// }

// Hooking up our function to theme setup
// add_action( 'init', 'create_posttype' );

/*
* Creating a function to create our CPT
*/

function custom_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Movies', 'Post Type General Name', 'twentytwenty'),
        'singular_name'       => _x('Movie', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name'           => __('Movies', 'twentytwenty'),
        'parent_item_colon'   => __('Parent Movie', 'twentytwenty'),
        'all_items'           => __('All Movies', 'twentytwenty'),
        'view_item'           => __('View Movie', 'twentytwenty'),
        'add_new_item'        => __('Add New Movie', 'twentytwenty'),
        'add_new'             => __('Add New', 'twentytwenty'),
        'edit_item'           => __('Edit Movie', 'twentytwenty'),
        'update_item'         => __('Update Movie', 'twentytwenty'),
        'search_items'        => __('Search Movie', 'twentytwenty'),
        'not_found'           => __('Not Found', 'twentytwenty'),
        'not_found_in_trash'  => __('Not found in Trash', 'twentytwenty'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('movies', 'twentytwenty'),
        'description'         => __('Movie news and reviews', 'twentytwenty'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array('genres'),
        /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('movies', $args);
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'custom_post_type', 0);

function add_my_post_types_to_query($query)
{
    if (is_home() && $query->is_main_query())
        $query->set('post_type', array('post', 'movies'));
    return $query;
}

add_action('pre_get_posts', 'add_my_post_types_to_query');

function getMainMenu($current_menu = 'Main menu')
{
    $menu_array = wp_get_nav_menu_items($current_menu);

    $menu = array();

    function populate_children($menu_array, $menu_item)
    {
        $children = array();
        if (!empty($menu_array)) {
            foreach ($menu_array as $k => $m) {
                if ($m->menu_item_parent == $menu_item->ID) {
                    $children[$m->ID] = array();
                    $children[$m->ID]['ID'] = $m->ID;
                    $children[$m->ID]['title'] = $m->title;
                    $children[$m->ID]['url'] = $m->url;
                    unset($menu_array[$k]);
                    $children[$m->ID]['children'] = populate_children($menu_array, $m);
                }
            }
        };
        return $children;
    }

    if ($menu_array != null) {
        foreach ($menu_array as $m) {
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID'] = $m->ID;
                $menu[$m->ID]['title'] = $m->title;
                $menu[$m->ID]['url'] = $m->url;
                $menu[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }
    }

    return $menu;
}
