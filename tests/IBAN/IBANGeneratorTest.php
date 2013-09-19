<?php

class IBANGeneratorTest extends PHPUnit_Framework_TestCase
{
    private $ibanGenerator;
    private $generatorTestData;
    
    protected function setUp() {
        $this->ibanGenerator = new \IBAN\Generation\IBANGenerator();
        $this->generatorTestData = file('tests/fixtures/test_data.txt');
    }

    protected function tearDown() {
        $this->ibanGenerator = null;
        $this->generatorTestData = null;
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingLocaleCode() {
        $this->ibanGenerator->generate('', '', '');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingInstituteIdentification() {
        $this->ibanGenerator->generate('DE', '', '');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingBankAccountNumber() {
        $this->ibanGenerator->generate('DE', '50010517', '');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnWrongLocaleCode() {
        $this->ibanGenerator->generate('FF', '10000000', '1000000000');
    }
    
    public function testGenerate_ValidIban() {
        foreach ($this->generatorTestData as $testData) {
            $testDataArray = explode(';', $testData);
            $generatedIban = $this->ibanGenerator->generate(trim($testDataArray[0]), trim($testDataArray[1]), trim($testDataArray[2]));
            $this->assertEquals(trim($testDataArray[3]), trim($generatedIban));
        }
    }
    
    public function testGenerate_IbanForRuleDE000200() {
        $generatedIban = $this->ibanGenerator->generate('DE', '72020700', '1000000860');
        $this->assertEquals('', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '72020700', '1000000600');
        $this->assertEquals('', trim($generatedIban));
    }
    
    public function testGenerate_IbanForRuleDE000300() {
    	$generatedIban = $this->ibanGenerator->generate('DE', '51010400', '6161604670');
    	$this->assertEquals('', trim($generatedIban));
    }
}
