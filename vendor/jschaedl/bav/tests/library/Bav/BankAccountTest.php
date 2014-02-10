<?php
namespace Bav;

class BankAccountTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {}

    protected function tearDown()
    {}

    public function testCreation()
    {
        $bankId = '50010517';
        $bankAccountNumber = '5403732019';
        $locale = 'DE';
        
        $bankAccount = new BankAccount($bankId, $bankAccountNumber, $locale);
        
        $this->assertInstanceOf('\Bav\BankAccount', $bankAccount);
    }
}
