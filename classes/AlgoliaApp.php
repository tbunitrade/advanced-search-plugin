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
        $app_id = get_option('algolia_app_id', '');
        $api_key = get_option('algolia_search_api_key', '');
        $this->client = SearchClient::create($app_id, $api_key);

        //$this->client = SearchClient::create('YourApplicationID', 'YourAdminAPIKey');
        // Ваш код инициализации клиента Algolia
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
            return !empty($indexes);
        } catch (\Exception $e) {
            return false;
        }
    }
}
