<?php

namespace AdvancedSearchPLugin;

class AjaxHandler
{

    //Добавим метод handle_search в AjaxHandler для обработки AJAX-запросов и выполнения поиска с использованием Algolia.

    public function handle_search()
    {
        if (!isset($_POST['query']) || empty($_POST['query'])) {
            wp_send_json_error('Поисковый запрос пуст');
            wp_die();
        }

        if (!isset($_POST['advanced_search_nonce']) || !wp_verify_nonce($_POST['advanced_search_nonce'], 'advanced_search_nonce')) {
            wp_send_json_error('Неверный nonce');
            wp_die();
        }

        $query = sanitize_text_field($_POST['query']);
        $algolia_app = new AlgoliaApp();
        $client = $algolia_app->getClient();

        try {
            $index = $client->initIndex('your_index_name');
            $results = $index->search($query);

            if (!empty($results['hits'])) {
                foreach ($results['hits'] as $hit) {
                    echo '<div class="search-result-item">';
                    echo '<h3>' . esc_html($hit['title']) . '</h3>';
                    echo '<p>' . esc_html($hit['content']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Ничего не найдено</p>';
            }
        } catch (\Exception $e) {
            echo '<p>Ошибка при выполнении поиска: ' . esc_html($e->getMessage()) . '</p>';
        }

        wp_die();
    }
}

# по сути стандартный санитайзер данных и подключение к клиенту