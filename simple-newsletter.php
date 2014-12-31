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

include_once "includes/custom-subscriber-fields.php";
include_once "includes/form-hooks.php";
