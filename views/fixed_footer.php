<?php
$sn_label = 'Fyll i din e-postadress för att prenummerera på vårt nyhetsbrev:';
?>
<div id="simple-newsletter-footer">
	<div class="sn_inside">
		<?php echo esc_attr($sn_label); ?>
		<div style="float:right;">
			<?php echo do_shortcode('[sn_form]'); ?>
		</div>
	</div>
</div>