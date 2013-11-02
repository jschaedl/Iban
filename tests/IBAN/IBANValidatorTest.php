<?php

use IBAN\Validation\IBANValidator;

class IBANValidatorTest extends PHPUnit_Framework_TestCase
{
    protected $ibanValidator;
    protected $ibans;

    protected function setUp() {
        $this->ibanValidator = new IBANValidator();
        $this->ibans = array();        
        $data = file('tests/fixtures/validation.data');
        foreach ($data as $line) {
        	array_push($this->ibans, explode(';', trim($line)));
        }
    }

    protected function tearDown() {
        $this->ibanValidator = null;
        $this->ibans = null;
    }

    public function testValidate_IfIbanIsValid() {
        foreach ($this->ibans as $iban) {
        	$this->assertEquals((boolean)($iban[0]), 
        		$this->ibanValidator->validate($iban[1]));
        }
    }
}
