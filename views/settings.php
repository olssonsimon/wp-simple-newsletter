<div class="wrap">
  <h2>Subscribers</h2>
  <br>

  <h3>Shortcode</h3>
  <p>Use this code to access the newsletter form: <input type="text" readonly value="[<?php echo $this->shortcode; ?>]"/></p>

  <?php
    $exportURL = add_query_arg(array(
      'action' => 'export_subscribers',
      'nc'     => time(),
    ), admin_url('admin-ajax.php'));
  ?>

  <h3>Export</h3>
  <a href="<?php echo $exportURL; ?>" class="button">Export subscribers</a>
</div>