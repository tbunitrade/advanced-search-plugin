<?php

namespace AdvancedSearchPlugin;

class Autoloader
{
    static function register()
    {
        require_once ADVANCED_SEARCH_DIR . 'classes/AjaxHandler.php';
        require_once ADVANCED_SEARCH_DIR . 'classes/AssetsHandler.php';
        require_once ADVANCED_SEARCH_DIR . 'classes/Hooks.php';
        require_once ADVANCED_SEARCH_DIR . 'classes/AdminMenu.php';
        require_once ADVANCED_SEARCH_DIR . 'classes/Plugin.php';
        require_once ADVANCED_SEARCH_DIR . 'classes/AlgoliaApp.php';
    }
}

#this is my core file with my Class, this my custom pattern i call it strategy.