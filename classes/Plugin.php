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
        $this->loaded = true;
    }

}