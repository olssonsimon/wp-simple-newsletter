<?php

// Change column name from 'Title' to 'Email' in the admin
function custom_subscriber_columns( $columns ) {
  $columns = array(
    'cb'    => '<input type="checkbox" />',
    'title' => __( 'Email', 'seodesign' )
  );
  return $columns;
}

// Change 'Enter title here' text to 'Enter email here' in the admin
function subscriber_custom_enter_title( $input ) {
  global $post_type;

  if ( is_admin() && 'sd_subscriber' == $post_type )
    return __( 'Enter email here', 'seodesign' );
  return $input;
}

// Add the hooks
add_filter( 'manage_edit-sd_subscriber_columns', 'custom_subscriber_columns' ) ;
add_filter( 'enter_title_here', 'subscriber_custom_enter_title' );