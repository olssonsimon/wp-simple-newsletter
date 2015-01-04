<form id="newsletter" action="" method="post" name="new_subscriber">
	<input name="email" id="email" type="email" placeholder="Email" class="input_mail hidden-phone">
	<input type="submit" value="Send" class="send_mail hidden-phone" id="newsletter-submit" name="add_subscriber"> 
	<input type="hidden" name="action" value="post" />
	<?php echo wp_nonce_field( 'new-subscriber' ); ?>
</form>