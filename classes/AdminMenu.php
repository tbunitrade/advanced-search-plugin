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
        $page_title = 'Advanced Search P',
        $menu_title = 'Advanced Search M',
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
    }

    public function render() {
        include_once ADVANCED_SEARCH_DIR . $this->template;
    }

}