<?php

namespace Payeer\Api\Response;

class OrderDto implements ResponseInterface
{
    public function __construct(array $data)
    {
        // .. foreach by data and set properties OR without _construct - use new this class and set properties
    }
}
