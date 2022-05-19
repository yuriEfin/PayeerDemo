<?php

namespace Payeer\Tests;

use PHPUnit\Framework\TestCase;

class PayeerTest extends TestCase
{
    /**
     * @dataProvider accountProvider
     */
    public function testAccount($data)
    {
        $this->assertEmpty($data, '>>> Data is not empty');
    }
    
    /**
     * @dataProvider ordersProvider
     */
    public function testOrders($data)
    {
        $this->assertEmpty($data, '>>> Data is not empty');
    }
    
    public function ordersProvider()
    {
        return [
            [1],
        ];
    }
    
    public function accountProvider()
    {
        return [
            [1],
        ];
    }
}