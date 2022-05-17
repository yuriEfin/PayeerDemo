<?php

namespace Payeer\Api;

use Payeer\Api\Response\Builder\Interfaces\BuilderInterface;
use Payeer\Api\Response\ResponseInterface as DtoResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
use Payeer\ApiClient;

// @TODO: POST | GET | ... to constants - in child classes
abstract class AbstractClient
{
    /**
     * Transport
     */
    protected ?ApiClient $client = null;
    protected ?BuilderInterface $responseBuilder = null;
    
// FOR php 8.0 - without declare protected
//    public function __construct(protected ApiClient $client, protected BuilderInterface $responseBuilder)
//    {
//        $this->client = $client;
//        $this->responseBuilder = $responseBuilder;
//    }
    
    public function __construct(ApiClient $client, BuilderInterface $responseBuilder)
    {
        $this->client = $client;
        $this->responseBuilder = $responseBuilder;
    }
    
    protected function buildResponse(Psr7ResponseInterface $data): DtoResponseInterface
    {
        return $this->responseBuilder->build(json_decode($data->getBody()->getContents(), true));
    }
}