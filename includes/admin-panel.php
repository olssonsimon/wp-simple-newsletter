<?php

// create custom plugin settings menu
add_action('admin_menu', 'subscriber_create_menu');

function subscriber_create_menu() {
  //create new top-level menu
  add_menu_page('Subscribers', 'Subscribers', 'administrator', __FILE__, 'subscriber_settings_page', '');
}

//create the settings page
function subscriber_settings_page() {
?>
<div class="wrap">
  <h2>Subscribers</h2>
  <br>

  <h3>Shortcode</h3>
  <p>Use this code to access the newsletter form: <input type="text" readonly value="[sn_form]"/></p>

  <?php
    $exportURL = add_query_arg(array(
      'action' => 'export_subscribers',
      'nc'     => time(),
    ), admin_url('admin-ajax.php'));
  ?>

  <h3>Export</h3>
  <a href="<?php echo $exportURL; ?>" class="button">Export subscribers</a>
</div>
<?php } ?>