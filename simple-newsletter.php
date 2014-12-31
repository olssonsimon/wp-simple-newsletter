<?php
/**
* Plugin Name: Simple Newsletter 2
* Description: A very simple but awsome newsletter
* Version: 2.0
* Author: Simon Olsson & Rasmus Kjellberg
* Text Domain: simplenewsletter
* @package simple-newsletter
**/

defined('ABSPATH') or die("No script kiddies please!");

// Define some good constants.
define( 'SN_VERSION', '2.0.0' );
define( 'SN__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SN__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include the class
include("src/simple-newsletter.class.php");


include_once "includes/posttype-subscriber.php";
include_once "includes/custom-subscriber-fields.php";
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