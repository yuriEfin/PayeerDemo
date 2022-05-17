<?php

namespace Payeer\Api\Response\Builder;

use Payeer\Api\Response\Builder\Exceptions\BuilderException;

class ResponseBuilderFactory
{
    private $builders = [
        'account'    => AccounBuilder::class,
        'order'      => OrderBuilder::class,
        'orderItems' => OrderItemsBuilder::class,
        // ...
    ];
    
    public function create($data)
    {
        $builderClass = $this->builders[$data['key']] ?? null;
        if ($builderClass) {
            throw new BuilderException('Not found builder for api key "' . $data['key'] . '"');
        }
        
        return (new $builderClass($data))->build();
    }
}
