<?php

namespace Payeer\Api;

class AccountClient extends AbstractClient
{
    public function account(): ?array
    {
        $res = $this->client->request(['method' => 'account',]);
        
        return $res['balances'] ?? null;
    }
}