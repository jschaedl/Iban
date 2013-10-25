<?php

use IBAN\Rule\DE\IBANRuleDE000100;
class IBANGeneratorTest extends PHPUnit_Framework_TestCase
{
    protected $ibanGenerator;
    protected $generatorTestData;
    
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
    
    /**
     * @expectedException Exception
     */
    public function testGenerateIbanForRuleDE000100ShouldThrowException() {
        $rule = new IBANRuleDE000100('', '', '');
        $rule->generateIban();
    }
    
    public function testGenerate_IbanForRuleDE000200() {
        $generatedIban = $this->ibanGenerator->generate('DE', '72020700', '1000000860');
        $this->assertEquals('', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '72020700', '1000000600');
        $this->assertEquals('', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '72020700', '12345678');
        $this->assertEquals('DE05720207000012345678', trim($generatedIban));
    }
    
    public function testGenerate_IbanForRuleDE000300() {
    	$generatedIban = $this->ibanGenerator->generate('DE', '51010800', '6161604670');
    	$this->assertEquals('', trim($generatedIban));
    	$generatedIban = $this->ibanGenerator->generate('DE', '51010800', '12345678');
    	$this->assertEquals('DE29510108000012345678', trim($generatedIban));
    }
    
    public function testGenerate_IbanForRuleDE000400() {
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '135');
        $this->assertEquals('DE86100500000990021440', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '1111');
        $this->assertEquals('DE19100500006600012020', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '1900');
        $this->assertEquals('DE73100500000920019005', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '7878');
        $this->assertEquals('DE48100500000780008006', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '8888');
        $this->assertEquals('DE43100500000250030942', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '9595');
        $this->assertEquals('DE60100500001653524703', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '97097');
        $this->assertEquals('DE15100500000013044150', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '112233');
        $this->assertEquals('DE54100500000630025819', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '336666');
        $this->assertEquals('DE22100500006604058903', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '10050000', '484848');
        $this->assertEquals('DE43100500000920018963', trim($generatedIban));
    }
    
    public function testGenerate_IbanForRuleDE001000() {
        $generatedIban = $this->ibanGenerator->generate('DE', '50050201', '2000');
        $this->assertEquals('DE42500502010000222000', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '50050201', '800000');
        $this->assertEquals('DE89500502010000180802', trim($generatedIban));
    }
    
    public function testGenerate_IbanForRuleDE001100() {
        $generatedIban = $this->ibanGenerator->generate('DE', '32050000', '1000');
        $this->assertEquals('DE44320500000008010001', trim($generatedIban));
        $this->assertFalse(strcmp('DE98320500000000001000', trim($generatedIban)) == 0);
        $generatedIban = $this->ibanGenerator->generate('DE', '32050000', '47800');
        $this->assertEquals('DE36320500000000047803', trim($generatedIban));
        $this->assertFalse(strcmp('DE20320500000000047800', trim($generatedIban)) == 0);       
    }
    
    public function testGenerate_IbanForRuleDE001201() {
        $generatedIban = $this->ibanGenerator->generate('DE', '50850049', '5000002096');
        $this->assertEquals('DE95500500005000002096', trim($generatedIban));
        $this->assertFalse(strcmp('DE44508500495000002096', trim($generatedIban)) == 0);
    }
    
    public function testGenerate_IbanForRuleDE001301() {
        $generatedIban = $this->ibanGenerator->generate('DE', '40050000', '60624');
        $this->assertEquals('DE15300500000000060624', trim($generatedIban));
        $this->assertFalse(strcmp('DE56400500000000060624', trim($generatedIban)) == 0);
    }
    
    public function testGenerate_IbanForRuleDE001400() {
        $generatedIban = $this->ibanGenerator->generate('DE', '30060601', '100100100');
        $this->assertEquals('DE53300606010100100100', trim($generatedIban));
        $generatedIban = $this->ibanGenerator->generate('DE', '33060616', '100100100');
        $this->assertEquals('DE53300606010100100100', trim($generatedIban));
    }
}
