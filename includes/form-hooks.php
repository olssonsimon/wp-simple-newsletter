<?php

// Export subscribers as CSV
function export_subscribers() {
  global $wpdb;

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=subscribers.csv');

  // create a file pointer connected to the output stream
  $output = fopen('php://output', 'w');

  // output the column headings
  fputcsv($output, array('EMAIL'));

  $rows = $wpdb->get_results("SELECT post_title FROM wp_posts WHERE post_type='sd_subscriber' AND post_status='publish'", ARRAY_A);

  // loop over the rows, outputting them
  foreach ($rows as $row) {
    if ($row && $row !== "")
      fputcsv($output, $row);
  }
}

add_action('wp_ajax_export_subscribers', 'export_subscribers');
add_action('wp_ajax_nopriv_export_subscribers', 'export_subscribers');

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
      'post_type'   => 'sd_subscriber',
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
