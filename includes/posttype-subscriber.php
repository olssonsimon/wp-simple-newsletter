<?php
// Register custom post type
function sn_subscriber() {
  $labels = array(
    'name'                => _x( 'Subscribers', 'Post Type General Name', 'seodesign' ),
    'singular_name'       => _x( 'Subscriber', 'Post Type Singular Name', 'seodesign' ),
    'menu_name'           => __( 'Subscribers', 'seodesign' ),
    'parent_item_colon'   => __( 'Parent Item:', 'seodesign' ),
    'all_items'           => __( 'All Subscribers', 'seodesign' ),
    'view_item'           => __( 'View Subscriber', 'seodesign' ),
    'add_new_item'        => __( 'Add New Subscriber', 'seodesign' ),
    'add_new'             => __( 'Add New', 'seodesign' ),
    'edit_item'           => __( 'Edit Subscriber', 'seodesign' ),
    'update_item'         => __( 'Update Subscriber', 'seodesign' ),
    'search_items'        => __( 'Search Subscriber', 'seodesign' ),
    'not_found'           => __( 'Not found', 'seodesign' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'seodesign' ),
  );
  $args = array(
    'label'               => __( 'sn_subscriber', 'seodesign' ),
    'description'         => __( 'Post Type Description', 'seodesign' ),
    'labels'              => $labels,
    'supports'            => array( 'title' ),
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
    'exclude_from_search' => true
  );
  register_post_type( 'sn_subscriber', $args );

}

// Hook into the 'init' action
add_action( 'init', 'sn_subscriber', 0 );
