<?php
namespace IBAN\Core;

use IBAN\Core\IBAN;

class IBANTest extends \PHPUnit_Framework_TestCase
{
    protected $iban;

    protected function setUp()
    {
        $this->iban = new IBAN('DE45500502011241539870');
    }

    protected function tearDown()
    {
        $this->iban = null;
    }

    public function testGetLocalCode()
    {
        $this->assertEquals('DE', $this->iban->getLocaleCode());
    }

    public function testGetChecksum()
    {
        $this->assertEquals('45', $this->iban->getChecksum());
    }

    public function testGetInstituteIdentification()
    {
        $this->assertEquals('50050201', $this->iban->getInstituteIdentification());
    }

    public function testGetBankAccountNumber()
    {
        $this->assertEquals('1241539870', $this->iban->getBankAccountNumber());
    }

    public function testIbanFormatter()
    {
        $this->assertEquals('DE45 5005 0201 1241 5398 70', $this->iban->format());
    }
}
