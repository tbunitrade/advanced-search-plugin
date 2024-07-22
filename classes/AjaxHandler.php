<?php

namespace AdvancedSearchPLugin;

class AjaxHandler
{
    public function get_request()
    {
        if (!wp_verify_nonce($_REQUEST['advanced_search_request'], 'advanced-search-plugin')) {
            wp_die('Invalid nonce');
        }

        $url_pattern = sanitize_text_field($_REQUEST['advanced_search_request']);

        //do smt with request

        exit;
    }
}