<?php

namespace Payeer\Api\Response\Builder;

use Payeer\Api\Response\AccountDto;
use Payeer\Api\Response\ResponseInterface;

class AccounBuilder extends AbstractBuilder
{
    public function build(array $data): ResponseInterface
    {
        // return new AccountDto($data);
    
        /*
         OR
        
         $dto = new AccountDto();
         $dto->setProperty1()
            ->setProperty2();
         */
    }
}