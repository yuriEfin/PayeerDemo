<?php

namespace Payeer\Api;

use Payeer\Api\Response\ResponseInterface;

class AccountClient extends AbstractClient
{
    public function account(): ?ResponseInterface
    {
        $response = $this->client->request('POST', ['endpoint' => 'account',]);
        
        return $this->buildResponse($response);
    }
}