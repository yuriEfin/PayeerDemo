<?php

namespace Payeer\Api;

class OrderClient extends AbstractClient
{
    public function create($req = [])
    {
        $response = $this->client->request(
            [
                'method' => 'order_create',
                'post'   => $req,
            ]
        );
        
        return $this->buildResponse($response);
    }
    
    public function getStatus(array $options = [])
    {
        $response = $this->client->request(
            [
                'method' => 'order_status',
                'post'   => $options,
            ]
        );
    
        return $this->buildResponse($response);
    }
    
    public function getMyOrders(array $options = [])
    {
        $response = $this->client->request(
            [
                'method' => 'my_orders',
                'post'   => $options,
            ]
        );
    
        return $this->buildResponse($response);
    }
}