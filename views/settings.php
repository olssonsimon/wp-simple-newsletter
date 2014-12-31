<div class="wrap">

	<h2><?php _e('Subscribers', 'simplenewsletter'); ?></h2>
	<br>

	<h3><?php _e('Shortcode', 'simplenewsletter'); ?></h3>
	<p><?php _e('Use this code to access the newsletter form:', 'simplenewsletter'); ?> <input type="text" readonly value="[sn_form]"/></p>

	<h3><?php _e('Export', 'simplenewsletter'); ?></h3>
	<a href="<?php echo $this->getExportURL(); ?>" class="button"><?php _e('Export', 'simplenewsletter'); ?> <?php _e('Subscribers', 'simplenewsletter'); ?></a>

	<hr>

	<form action='options.php' method='post'>
				
		<?php
		settings_fields( 'sn_settings' );
		do_settings_sections( 'sn_settings' );
		submit_button();
		?>
		
	</form>


</div>