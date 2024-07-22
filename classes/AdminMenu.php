<?php

namespace AdvancedSearchPLugin;

class AdminMenu
{
    private $template;
    private $page_title;
    private $menu_title;
    private $capability;
    private $slug;
    private $callback;
    private $dashicon;
    private $position;

    //Awful design, yay!
    public function __construct(
        $template = 'views/admin/main.php',
        $page_title = 'Advanced Search',
        $menu_title = 'Advanced Search',
        $capability = 'manage_options',
        $slug = 'advanced-search',
        $callback = 'render',
        $dashicon = 'dashicons-admin-generic',
        $position = 99
    )
    {
        $this->template = $template;
        $this->page_title = $page_title;
        $this->menu_title = $menu_title;
        $this->capability = $capability;
        $this->slug = $slug;
        $this->callback = $callback;
        $this->dashicon = $dashicon;
        $this->position = $position;

        add_action('admin_init', [$this, 'register_settings']);
        add_action('admin_menu', [$this, 'register']);
    }

    public function render_test_connection_page() {
        $algolia_app = new AlgoliaApp();
        $connection_result = $algolia_app->testConnection();
        ?>
        <div class="wrap">
            <h1>Проверка соединения с Algolia</h1>
            <?php if ($connection_result['status']): ?>
                <p style="color: green;"><?php echo esc_html($connection_result['message']); ?></p>
            <?php else: ?>
                <p style="color: red;"><?php echo esc_html($connection_result['message']); ?></p>
            <?php endif; ?>
        </div>
        <?php
    }
    public function register() {
        add_menu_page(
            $this->page_title,
            $this->menu_title,
            $this->capability,
            $this->slug,
            [$this, $this->callback],
            $this->dashicon,
            $this->position
        );
        add_submenu_page(
            $this->slug,
            'Настройки',
            'Настройки',
            $this->capability,
            'advanced-search-settings',
            [$this, 'render_settings_page']
        );
        add_submenu_page(
            $this->slug,
            'Проверка соединения',
            'Проверка соединения',
            $this->capability,
            'advanced-search-test-connection',
            [$this, 'render_test_connection_page']
        );
    }

    public function render() {
        include_once ADVANCED_SEARCH_DIR . $this->template;
    }

    public function register_settings()
    {
        register_setting('advanced_search_settings_group', 'algolia_app_id');
        register_setting('advanced_search_settings_group', 'algolia_search_api_key');
    }

    // Создадим метод для вывода формы настроек
    public function render_settings_page() {
        ?>
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
        <?php
    }


}