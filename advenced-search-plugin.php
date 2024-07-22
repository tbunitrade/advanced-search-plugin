<?php
/*
 * Plugin Name: Advanced Search
 * Description: Plugin for API Algolia, advanced search.
 * Author: OSONY
 * Version: 1.2
 */


define('ADVANCED_SEARCH_DIR', plugin_dir_path( __FILE__ ));
define('ADVANCED_SEARCH_URL', plugin_dir_url( __FILE__ ));
require_once ADVANCED_SEARCH_DIR . 'vendor/autoload.php';
require_once ADVANCED_SEARCH_DIR . 'classes/Autoloader.php';
AdvancedSearchPLugin\Autoloader::register();

$asplugin = new AdvancedSearchPLugin\Plugin();

add_action('plugin_loaded', array($asplugin, 'load'));

register_activation_hook(__FILE__, 'AdvancedSearchPlugin\Hooks::activation');
register_deactivation_hook(__FILE__, 'AdvancedSearchPlugin\Hooks::deactivation');
register_uninstall_hook(__FILE__, 'AdvancedSearchPlugin\Hooks::uninstall');
