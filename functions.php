<?php
//Menu
register_nav_menus(
  array("primary-menu" => "Top Menu")
);

//Images for Posts
add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup() {
  add_theme_support('post-thumbnails');
}

// custom post type created
// add_action('init', 'create_custom_post_type', 0);
// function create_custom_post_type() {
//   $labels = array(
//     'name'                  => _x('Shop', 'Post Type General Name', 'text_domain'),
//     'singular_name'         => _x('Shop', 'Post Type Singular Name', 'text_domain'),
//     'menu_name'             => __('Shop', 'text_domain'),
//     'name_admin_bar'        => __('Shop', 'text_domain'),
//     'archives'              => __('Shop Archives', 'text_domain'),
//     'attributes'            => __('Shop Attributes', 'text_domain'),
//     'parent_item_colon'     => __('Parent Shop:', 'text_domain'),
//     'all_items'             => __('All Shop', 'text_domain'),
//     'add_new_item'          => __('Add New Shop', 'text_domain'),
//     'add_new'               => __('Add New', 'text_domain'),
//     'new_item'              => __('New Shop', 'text_domain'),
//     'edit_item'             => __('Edit Shop', 'text_domain'),
//     'update_item'           => __('Update Shop', 'text_domain'),
//     'view_item'             => __('View Shop', 'text_domain'),
//     'view_items'            => __('View Shop', 'text_domain'),
//     'search_items'          =>  __('Search Shop', 'text_domain'),
//     'not_found'             => __('Not found', 'text_domain'),
//     'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
//     'featured_image'        => __('Featured Image', 'text_domain'),
//     'set_featured_image'    => __('Set featured image', 'text_domain'),
//     'remove_featured_image' => __('Remove featured image', 'text_domain'),
//     'use_featured_image'    => __('Use as featured image', 'text_domain'),
//     'insert_into_item'      => __('Insert into Shop', 'text_domain'),
//     'uploaded_to_this_item' => __('Uploaded to this Shop', 'text_domain'),
//     'items_list'            => __('Shop list', 'text_domain'),
//     'items_list_navigation' => __('Shop list navigation', 'text_domain'),
//     'filter_items_list'     => __('Filter Shop list', 'text_domain'),
//   );

//   $args = array(
//     'label'                 => __('Shop', 'text_domain'),
//     'description'           => __('Shop Description', 'text_domain'),
//     'labels'                => $labels,
//     'supports'              => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
//     'taxonomies'            => array('category', 'post_tag'),
//     'hierarchical'          => false,
//     'public'                => true,
//     'show_ui'               => true,
//     'show_in_menu'          => true,
//     'menu_position'         => 5,
//     'show_in_admin_bar'     => true,
//     'show_in_nav_menus'     => true,
//     'can_export'            => true,
//     'has_archive'           => true,
//     'exclude_from_search'   => false,
//     'publicly_queryable'    => true,
//     'capability_type'       => 'post',
//   );

//   register_post_type('shop', $args);
// }
//

// Custom Texonomy
function create_custom_taxonomy() {
  // Labels for the taxonomy
  $labels = array(
      'name'              => _x('Brand', 'taxonomy general name'),
      'singular_name'     => _x('Brand', 'taxonomy singular name'),
      'search_items'      => __('Search Brand'),
      'all_items'         => __('All Brands'),
      'parent_item'       => __('Parent Brand'),
      'parent_item_colon' => __('Parent Brand:'),
      'edit_item'         => __('Edit Brand'),
      'update_item'       => __('Update Brand'),
      'add_new_item'      => __('Add New Brand'),
      'new_item_name'     => __('New Brand Name'),
      'menu_name'         => __('Brand'),
  );

  // Register the taxonomy
  register_taxonomy('brand', array('post'), array(
      'hierarchical'      => true, // true means it behaves like categories (with parent/child relationships), false means it behaves like tags.
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array('slug' => 'brand'),
  ));
}

add_action('init', 'create_custom_taxonomy');

?>

