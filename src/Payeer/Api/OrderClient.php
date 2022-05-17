<?php

namespace Payeer\Api;

// @TODO: POST | GET | ... to constants
class OrderClient extends AbstractClient
{
    public function create($req = [])
    {
        $response = $this->client->request(
            'POST',
            [
                'endpoint' => 'order_create',
                'post'   => $req,
            ]
        );
        
        return $this->buildResponse(json_decode($response->getBody()->getContents(), true));
    }
    
    public function getStatus(array $options = [])
    {
        $response = $this->client->request(
            'POST',
            [
                'endpoint' => 'order_status',
                'post'   => $options,
            ]
        );
    
        return $this->buildResponse(json_decode($response->getBody()->getContents(), true));
    }
    
    public function getMyOrders(array $options = [])
    {
        $response = $this->client->request(
            'POST',
            [
                'endpoint' => 'orders',
                'post'   => $options,
            ]
        );
    
        return $this->buildResponse(json_decode($response->getBody()->getContents(), true));
    }
}