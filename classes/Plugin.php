<?php

namespace AdvancedSearchPLugin;
class Plugin
{
    private $loaded;
    private $menu;
    private $assets_handler;
    private $ajax_handler;
    private $algolia_app;

    public function __construct()
    {
        $this->loaded = false;
        $this->menu = new AdminMenu();
        $this->assets_handler = new AssetsHandler();
        $this->ajax_handler = new AjaxHandler();
        $this->algolia_app = new AlgoliaApp();
    }

    public function load()
    {
        if($this->loaded) return;
        add_action( 'admin_menu', [$this->menu, 'register'] );
        add_action( 'wp_enqueue_scripts', array($this->assets_handler, 'MyScripts') );
        add_shortcode('advanced_search_form', [$this, 'render_search_form']);
        add_action('wp_ajax_nopriv_advanced_search', [$this->ajax_handler, 'handle_search']);
        add_action('wp_ajax_advanced_search', [$this->ajax_handler, 'handle_search']);
        $this->loaded = true;
    }

    public function render_search_form()
    {
        ob_start();
        ?>
        <form id="advanced-search-form">
            <input type="text" name="query" placeholder="Введите поисковый запрос">
            <button type="submit">Поиск</button>
        </form>
        <div id="search-results"></div>
        <script>
            jQuery(document).ready(function($) {
                $('#advanced-search-form').on('submit', function(e) {
                    e.preventDefault();
                    var query = $(this).find('input[name="query"]').val();
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        method: 'POST',
                        data: {
                            action: 'advanced_search',
                            query: query,
                        },
                        success: function(response) {
                            $('#search-results').html(response);
                        }
                    });
                });
            });
        </script>
        <?php
        return ob_get_clean();
    }
}