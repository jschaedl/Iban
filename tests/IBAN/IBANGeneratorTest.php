<?php
class IBANGeneratorTest extends PHPUnit_Framework_TestCase
{
    protected function setUp() {
    }

    protected function tearDown() {
    }
    
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingLocaleCode(){
        $ibanGenerator = new \IBAN\IBANGenerator();
        $ibanGenerator->generate('', '', '');
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingInstituteIdentification(){
        $ibanGenerator = new \IBAN\IBANGenerator();
        $ibanGenerator->generate('DE', '', '');
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingBankAccountNumber(){
        $ibanGenerator = new \IBAN\IBANGenerator();
        $ibanGenerator->generate('DE', '50010517', '');
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnWrongLocaleCode(){
        $ibanGenerator = new \IBAN\IBANGenerator();
        $ibanGenerator->generate('FF', '1000000000', '10000000');
    }
}
