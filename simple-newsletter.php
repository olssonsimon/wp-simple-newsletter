<?php
/**
* Plugin Name: Simple Newsletter 2
* Description: A very simple but awsome newsletter
* Version: 2.0
* Author: Simon Olsson & Rasmus Kjellberg
**/

defined('ABSPATH') or die("No script kiddies please!");

include_once "includes/posttype-subscriber.php";
include_once "includes/custom-subscriber-fields.php";
include_once "includes/admin-panel.php";
include_once "includes/form-hooks.php";

// TODO: Accept classes
// Form shortcode
function newsletter_shortcode( $atts ) {
  return '
  <form id="newsletter" action="" method="post" name="new_subscriber">
  <input type="submit" value="Send" class="send_mail hidden-phone" id="newsletter-submit" name="add_subscriber"> 
  <input name="email" id="email" type="email" placeholder="Email" class="input_mail hidden-phone">
  <input type="hidden" name="action" value="post" />' . wp_nonce_field( 'new-subscriber' ) . '</form>';
}

add_shortcode( 'sn_form', 'newsletter_shortcode' );