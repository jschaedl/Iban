<?php

namespace IBAN\Validation;

use IBAN\Validation\IBANValidator;

class IBANValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $ibanValidator;
    protected $ibans;

    protected function setUp()
    {
        $this->ibanValidator = new IBANValidator();
        $this->ibans = array();
        $this->ibans = file(__DIR__ . '/../../../data/validation.data');
    }

    protected function tearDown()
    {
        $this->ibanValidator = null;
        $this->ibans = null;
    }

    public function testValidate_IfIbanIsValid()
    {
        foreach ($this->ibans as $ibanData) {
            $ibanDataArray = explode(';', trim($ibanData));
            $this->assertEquals((boolean) ($ibanDataArray[0]),
                $this->ibanValidator->validate($ibanDataArray[1]));
        }
    }
}
