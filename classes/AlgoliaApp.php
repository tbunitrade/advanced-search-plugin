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
        $this->client = SearchClient::create('YourApplicationID', 'YourAdminAPIKey');
        // Ваш код инициализации клиента Algolia
    }

    public function getClient()
    {
        return $this->client;
    }
}
