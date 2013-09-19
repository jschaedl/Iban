<?php
class IBANValidatorTest extends PHPUnit_Framework_TestCase
{
    protected $ibanValidator;
    protected $validIbans;
    protected $invalidIbans;

    protected function setUp() {
        $this->ibanValidator = new \IBAN\IBANValidator();
        $this->validIbans = file('tests/fixtures/valid_ibans.txt');
        $this->invalidIbans = file('tests/fixtures/invalid_ibans.txt');
    }

    protected function tearDown() {
        $this->ibanValidator = null;
        $this->validIbans = null;
        $this->invalidIbans = null;
    }

    public function testValidate_IfIbanIsValid() {
        foreach ($this->validIbans as $validIban) {
            $this->assertEqualsIsValid(trim($validIban));
        }
    }

    public function testValidate_IfIbanIsInvalid() {
        foreach ($this->invalidIbans as $invalidIban) {
            $this->assertEqualsIsInvalid(trim($invalidIban));
        }
    }

    private function assertEqualsIsValid($iban) {
        $this->assertEquals($this->ibanValidator->validate($iban), true);
    }

    private function assertEqualsIsInvalid($iban) {
        $this->assertEquals($this->ibanValidator->validate($iban), false);
    }
}
