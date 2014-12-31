<?php
/**
 * @package simple-newsletter
 */

use SimpleNewsletter\Export as Export;

class SimpleNewsletter
{
	protected $post_type = 'sn_subscriber';
	protected $query_var = 'sn_subscriber';
	protected $shortcode = 'sn_form';

	public function __construct() {

		// Add all actions
		$this->addActions();

		// Add Filters
		$this->addShortcodes();

		// Add shortcodes
		$this->addShortcodes();

		// Add filters
		$this->addFilters();

 	}

 	public function addActions() {

 		// create custom plugin settings menu
		add_action('admin_menu', array($this, 'admin_menu') );

		// Load plugin textdomain.
		add_action( 'plugins_loaded', array($this, 'plugins_loaded') );

		// Hook into the 'init' action
		add_action( 'init', array($this, 'init'), 0 );

 		add_action('wp_ajax_export_subscribers', array('SimpleNewsletter\Export','CSV') );
		add_action('wp_ajax_nopriv_export_subscribers', array($this, 'export_subscribers') );

 		// add_action( 'template_redirect', 'add_subscriber_form_process' );
 	}

 	public function init() {

 		register_post_type( $this->post_type, $this->getPostTypeArgs() );
 	}

 	public function addShortcodes() {
 		add_shortcode( $this->shortcode , 'getForm' );
 	}

 	public function addFilters() {
 		add_filter( 'manage_edit-sn_subscriber_columns', array($this, 'custom_subscriber_columns') ) ;
		add_filter( 'enter_title_here', array($this, 'subscriber_custom_enter_title') );
 	}

 	// Hook Plugins Loaded
 	public function plugins_loaded() {
		load_plugin_textdomain( 'simplenewsletter', false, SN__PLUGIN_DIR . 'languages' ); 
 	}

	// create custom plugin settings menu
 	public function admin_menu() {
	  add_submenu_page( 'edit.php?post_type=' . $this->query_var , __('Settings'), __('Settings'), 'administrator', 'settings', array($this, 'initSettingsPage') );
	}

	// Get arguments for new post type Subscribers:
	public function getPostTypeArgs() {

		$labels = array(
		    'name'                => _x( 'Subscribers', 'Post Type General Name', 'simplenewsletter' ),
		    'singular_name'       => _x( 'Subscriber', 'Post Type Singular Name', 'simplenewsletter' ),
		    'menu_name'           => __( 'Subscribers', 'simplenewsletter' ),
		    'parent_item_colon'   => __( 'Parent Item:', 'simplenewsletter' ),
		    'all_items'           => __( 'All Subscribers', 'simplenewsletter' ),
		    'view_item'           => __( 'View Subscriber', 'simplenewsletter' ),
		    'add_new_item'        => __( 'Add New Subscriber', 'simplenewsletter' ),
		    'add_new'             => __( 'Add New', 'simplenewsletter' ),
		    'edit_item'           => __( 'Edit Subscriber', 'simplenewsletter' ),
		    'update_item'         => __( 'Update Subscriber', 'simplenewsletter' ),
		    'search_items'        => __( 'Search Subscriber', 'simplenewsletter' ),
		    'not_found'           => __( 'Not found', 'simplenewsletter' ),
		    'not_found_in_trash'  => __( 'Not found in Trash', 'simplenewsletter' ),
		  );

		  $args = array(
		    'description'         => __( 'Simple Newsletter', 'simplenewsletter' ),
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
		    'publicly_queryable'  => false,
		    'capability_type'     => 'post',
		    'exclude_from_search' => true
		  );

		  return $args;
	}

	// Include view with settings page	
	public function initSettingsPage() {
		include( SN__PLUGIN_DIR . "views/settings.php");
	}

	public function getExportURL() {
		return add_query_arg(array(
	      'action' => 'export_subscribers',
	      'nc'     => time(),
	    ), admin_url('admin-ajax.php'));
	}

	// Include view with form
	public function getForm($atts = array()) {
		include( SN__PLUGIN_DIR . "views/form.php");
	}

	// Change column name from 'Title' to 'Email' in the admin
	public function custom_subscriber_columns( $columns ) {
	  $columns = array(
	    'cb'    => '<input type="checkbox" />',
	    'title' => __( 'Email', 'simplenewsletter' )
	  );
	  return $columns;
	}

	// Change 'Enter title here' text to 'Enter email here' in the admin
	public function subscriber_custom_enter_title( $input ) {
	  global $post_type;

	  if ( is_admin() && 'sn_subscriber' == $post_type )
	    return __( 'Enter email here', 'simplenewsletter' );
	  return $input;
	}

	// Handle the form submit 
	public function add_subscriber_form_process() {

		if(!isset($_POST['add_subscriber']))
			return;

		// Validate the email
		if ( isset( $_POST['email'] ) && filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
		
		// Retreive the email
		$email = $_POST['email'];

		/*
		 * @todo: Check for email in database so we don't get duplicates.
		*/

		// Construct the post
		$post = array(
		  'post_title'  => $email,
		  'post_type'   => $this->post_type,
		  'post_status' => 'publish'
		);

		// Insert the post
		wp_insert_post( $post );

		// Reset the form fields
		$_POST = array();

		} else {
			// @todo: ERROR HANDLING
		}
	}

} new SimpleNewsletter;