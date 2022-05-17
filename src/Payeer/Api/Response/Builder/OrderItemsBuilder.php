<?php

namespace Payeer\Api\Response\Builder;

use Payeer\Api\Response\ResponseInterface;

class OrderItemsBuilder extends AbstractBuilder
{
    public function build(array $data): ResponseInterface
    {
        // return new OrderItems($data);
    
        /*
         OR
        
         $dto = new OrderItems();
         $dto->setProperty1()
            ->setProperty2();
         */
    }
}