<?php

namespace Payeer\Api\Response\Builder;

use Payeer\Api\Response\Builder\Exceptions\BuilderException;
use Payeer\Api\Response\Builder\Interfaces\BuilderInterface;
use Payeer\Api\Response\ResponseInterface;

class ResponseBuilder implements BuilderInterface
{
    private $builders = [
        'account'    => AccounBuilder::class,
        'order'      => OrderBuilder::class,
        'orderItems' => OrderItemsBuilder::class,
        // ...
    ];
    
    public function build(array $data = []): ResponseInterface
    {
        $builderClass = $this->builders[$data['key']] ?? null;
        if ($builderClass) {
            throw new BuilderException('Not found builder for api key "' . $data['key'] . '"');
        }
        
        return (new $builderClass($data))->build();
    }
}
