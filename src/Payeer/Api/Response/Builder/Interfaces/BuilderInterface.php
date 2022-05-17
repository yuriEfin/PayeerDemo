<?php

namespace Payeer\Api\Response\Builder\Interfaces;

use Payeer\Api\Response\ResponseInterface;

interface BuilderInterface
{
    public function build(array $data): ResponseInterface;
}
