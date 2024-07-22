<?php

namespace AdvancedSearchPlugin;

use Algolia\AlgoliaSearch\SearchClient;

class AlgoliaApp
{
    private $client;

    public function __construct()
    {
        $this->initialize_algolia();
    }

    protected function initialize_algolia()
    {
        $app_id = get_option('algolia_app_id');
        $api_key = get_option('algolia_search_api_key');
        $this->client = SearchClient::create($app_id, $api_key);
    }
    public function getClient()
    {
        return $this->client;
    }
    public function testConnection()
    {
        try {
            $client = $this->getClient();
            $indexes = $client->listIndices();
            return [
                'status' => !empty($indexes),
                'message' => !empty($indexes) ? 'Соединение успешно установлено!' : 'Не удалось получить индексы.'
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Ошибка: ' . $e->getMessage()
            ];
        }
    }
}

#основа приложения, проверяет коннект и ловит ошибку  и разпознает ошибку