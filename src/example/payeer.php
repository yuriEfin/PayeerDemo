<?php

require 'vendor/autoload.php';

use Payeer\Api\AccountClient;

class PayeerAccountController
{
    private ?AccountClient $client = null;
    
    /**
     * Dependency Injection
     */
    public function __construct(AccountClient $client)
    {
        $this->client = $client;
    }
    
    public function actionBalance()
    {
        $data = $this->client->account();
        // ... use data api
    }
}
