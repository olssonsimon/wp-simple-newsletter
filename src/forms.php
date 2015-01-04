<?php
/**
 * @package simple-newsletter
*/
namespace SimpleNewsletter;

class Form 
{

	public static function settings(  ) { 

		register_setting( 'sn_settings', 'sn_subscriber_settings' );

		add_settings_section(
			'sn_checkboxes', 
			__( 'Newsletter settings', 'simplenewsletter' ), 
			array('SimpleNewsletter\Form', 'sn_subscriber_settings_section_callback'), 
			'sn_settings'
		);

		add_settings_field( 
			'sn_show_footer', 
			__( 'Enable fixed footer', 'simplenewsletter' ), 
			array('SimpleNewsletter\Form', 'sn_field_show_footer'), 
			'sn_settings', 
			'sn_checkboxes' 
		);


	}


	public static function sn_field_show_footer() { 

		$options = get_option( 'sn_subscriber_settings' );
		?>
		<input type='checkbox' name='sn_subscriber_settings[sn_show_footer]' <?php checked( $options['sn_show_footer'], 1 ); ?> value='1'>
		<?php

	}

	public static function sn_subscriber_settings_section_callback(  ) { 
		return;
	}


}