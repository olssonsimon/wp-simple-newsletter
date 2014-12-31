<?php
/**
 * @package simple-newsletter
 */
class SimpleNewsletter
{
	protected $query_var = 'sn_subscriber';
	protected $shortcode = 'sn_form';

	public function __construct() {

		// Add all actions
		$this->addActions();

		// Add Filters
		$this->addShortcodes();

		// Add shortcodes
		$this->addShortcodes();

 	}

 	public function addActions() {

 		// create custom plugin settings menu
		add_action('admin_menu', array($this, 'create_menu') );

 		// add_action( 'init', 'sn_subscriber', 0 );
 		// add_action('wp_ajax_export_subscribers', 'export_subscribers');
		// add_action('wp_ajax_nopriv_export_subscribers', 'export_subscribers');

 		// add_action( 'template_redirect', 'add_subscriber_form_process' );
 	}

 	public function addShortcodes() {
 		// add_shortcode( 'sn_form', 'newsletter_shortcode' );
 	}

 	public function addFilters() {
 		// add_filter( 'manage_edit-sn_subscriber_columns', 'custom_subscriber_columns' ) ;
		// add_filter( 'enter_title_here', 'subscriber_custom_enter_title' );
 	}

	// create custom plugin settings menu
 	public function create_menu() {
	  add_menu_page('Subscribers', 'Subscribers', 'administrator', __FILE__, 'subscriber_settings_page', '');
	  add_submenu_page( 'edit.php?post_type=' . $this->query_var , __('Settings'), __('Settings'), 'administrator', 'settings', array($this, 'initSettingsPage') );
	}

	public function initSettingsPage() {
		include( SN__PLUGIN_DIR . "views/settings.php");
	}

} new SimpleNewsletter;