<?php

Class PagesTest extends PHPUnit\Framework\TestCase
{
    public function testTransactionCommission()
    {
        $transactionCommission = new TransactionCommission();
        $expected = ['1','0.46','1.72','2.39','45.33'];
        $inputs = file_get_contents('../../input.txt');
        $this->assertEquals($expected, $transactionCommission->getTransactionCommission($inputs));
    }
}