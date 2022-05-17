<?php

namespace Payeer\Api;

use Payeer\Api\Response\Builder\ResponseBuilderFactory;
use Payeer\Api\Response\ResponseInterface;
use Payeer\ApiClient;

class AbstractClient
{
    /**
     * Transport
     */
    protected ApiClient $client;
    
    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }
    
    protected function buildResponse(array $data):ResponseInterface
    {
        return ResponseBuilderFactory::create($data);
    }
}