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


        //wp_enqueue_style('advanced-style', ADVANCED_SEARCH_URL.'/assets/css/advanced-style.css', '' , date());
    }



    public function adminScripts() {
        if( !wp_script_is( 'test-task-admin.js' , 'enqueued' ) ){
            //wp_enqueue_script('test-task-admin-script', TEST_TASK_URL . 'assets/admin/js/test-task-admin.js', array('jquery'), '1.5', true);
            //wp_localize_script('test-task-admin-script', 'testTaskAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
        }
    }


}