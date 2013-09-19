<?php

class IBANGeneratorTest extends PHPUnit_Framework_TestCase
{
    private $ibanGenerator;
    private $generatorTestData;
    
    protected function setUp() {
        $this->ibanGenerator = new \IBAN\IBANGenerator(new \IBAN\Rule\IBANRuleFactory());
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
        $this->ibanGenerator->generate('FF', '1000000000', '10000000');
    }
    
    public function testGenerate_ValidIban() {
        foreach ($this->generatorTestData as $testData) {
            $testDataArray = explode(';', $testData);
            $generatedIban = $this->ibanGenerator->generate(trim($testDataArray[0]), trim($testDataArray[1]), trim($testDataArray[2]));
            $this->assertEquals(trim($testDataArray[3]), trim($generatedIban));
        }
    }
}
