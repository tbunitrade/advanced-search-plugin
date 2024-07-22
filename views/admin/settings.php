<div class="wrap">
    <h1>Настройки Advanced Search</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('advanced_search_settings_group');
        do_settings_sections('advanced_search_settings_group');
        ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Algolia App ID</th>
                <td><input type="text" name="algolia_app_id" value="<?php echo esc_attr(get_option('algolia_app_id')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Algolia Search API Key</th>
                <td><input type="text" name="algolia_search_api_key" value="<?php echo esc_attr(get_option('algolia_search_api_key')); ?>" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
