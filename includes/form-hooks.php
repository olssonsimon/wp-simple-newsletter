<?php

// Handle the form submit
function add_subscriber_form_process() {
  if(!isset($_POST['add_subscriber']))
    return;
  
  // Validate the email
  if ( isset( $_POST['email'] ) && filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
    // Retreive the email
    $email = $_POST['email'];

    // Construct the post
    $post = array(
      'post_title'  => $email,
      'post_type'   => 'sn_subscriber',
      'post_status' => 'publish'
    );

    // Insert the post
    wp_insert_post( $post );

    // Reset the form fields
    $_POST = array();

  } else {
    // TODO: ERROR HANDLING
  }
}

// Add the hooks
add_action( 'template_redirect', 'add_subscriber_form_process' );
