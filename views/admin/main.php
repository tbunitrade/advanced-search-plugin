<h1>Test Task</h1>
<p>This is simple page, now we can only add a CREDENTIALS for API, no more deals with API for this version, only test connection</p>

<form method="post" action="options.php">
    <?php
    settings_fields('advanced_search_plugin_settings');
    do_settings_sections('advanced_search_plugin');
    submit_button();
    ?>
</form>
