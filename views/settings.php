<div class="wrap">
  <h2><?php _e('Subscribers', 'simplenewsletter'); ?></h2>
  <br>

  <h3><?php _e('Shortcode', 'simplenewsletter'); ?></h3>
  <p><?php _e('Use this code to access the newsletter form:', 'simplenewsletter'); ?> <input type="text" readonly value="[sn_form]"/></p>

  <?php
    $exportURL = add_query_arg(array(
      'action' => 'export_subscribers',
      'nc'     => time(),
    ), admin_url('admin-ajax.php'));
  ?>

  <h3><?php _e('Export', 'simplenewsletter'); ?></h3>
  <a href="<?php echo $exportURL; ?>" class="button"><?php _e('Export', 'simplenewsletter'); ?> <?php _e('Subscribers', 'simplenewsletter'); ?></a>
</div>