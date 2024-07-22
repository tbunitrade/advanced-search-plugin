<?php
namespace AdvancedSearchPLugin;

class AssetsHandler
{
    public function MyScripts()
    {

        if( !wp_script_is('advanced-script.js','enqueued')){
            wp_enqueue_script('advanced-script', ADVANCED_SEARCH_URL . '/assets/js/advanced-script.js', array('jquery'), '1.5', true);
            wp_localize_script('advanced-script', 'advancedAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
            wp_enqueue_style('asp_custom_css', ADVANCED_SEARCH_URL . '/assets/css/advanced-style.css');
        }
    }
}