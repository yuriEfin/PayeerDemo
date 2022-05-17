<?php

namespace Payeer\Api\Response\Builder;

use Payeer\Api\Response\OrderDto;
use Payeer\Api\Response\ResponseInterface;

class OrderBuilder extends AbstractBuilder
{
    public function build(array $data): ResponseInterface
    {
        // return new OrderDto($data);
    
        /*
         OR
        
         $dto = new OrderDto();
         $dto->setProperty1()
            ->setProperty2();
         */
    }
}