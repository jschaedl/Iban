<?php

use IBAN\Rule\DE\IBANRuleDE000100;
use IBAN\Generation\IBANGenerator;
use IBAN\Rule\IBANRuleFactory;

class IBANGeneratorTest extends PHPUnit_Framework_TestCase
{
    protected $ibanGenerator;
    protected $generatorTestData;
    
    protected function setUp() {
        $this->ibanGenerator = new \IBAN\Generation\IBANGenerator(new IBANRuleFactory('DE'));
        $this->generatorTestData = file('tests/fixtures/test_data.txt');
    }

    protected function tearDown() {
        $this->ibanGenerator = null;
        $this->generatorTestData = null;
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingInstituteIdentification() {
        IBANGenerator::DE('', '');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingBankAccountNumber() {
        IBANGenerator::DE('50010517', '');
    }
    
    public function testGenerate_ValidIban() {
        foreach ($this->generatorTestData as $testData) {
            $testDataArray = explode(';', $testData);
            $generatedIban = IBANGenerator::DE(trim($testDataArray[1]), trim($testDataArray[2]));
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
        $this->assertIban('', IBANGenerator::DE('72020700', '1000000860'));
        $this->assertIban('', IBANGenerator::DE('72020700', '1000000600'));
        $this->assertIban('DE05720207000012345678', IBANGenerator::DE('72020700', '12345678'));
    }
    
    public function testGenerate_IbanForRuleDE000300() {
    	$this->assertIban('', IBANGenerator::DE('51010800', '6161604670'));
    	$this->assertIban('DE29510108000012345678', IBANGenerator::DE('51010800', '12345678'));
    }
    
    public function testGenerate_IbanForRuleDE000400() {
        $this->assertIban('DE86100500000990021440', IBANGenerator::DE('10050000', '135'));
        $this->assertIban('DE19100500006600012020', IBANGenerator::DE('10050000', '1111'));
        $this->assertIban('DE73100500000920019005', IBANGenerator::DE('10050000', '1900'));
        $this->assertIban('DE48100500000780008006', IBANGenerator::DE('10050000', '7878'));
        $this->assertIban('DE43100500000250030942', IBANGenerator::DE('10050000', '8888'));
        $this->assertIban('DE60100500001653524703', IBANGenerator::DE('10050000', '9595'));
        $this->assertIban('DE15100500000013044150', IBANGenerator::DE('10050000', '97097'));
        $this->assertIban('DE54100500000630025819', IBANGenerator::DE('10050000', '112233'));
        $this->assertIban('DE22100500006604058903', IBANGenerator::DE('10050000', '336666'));
        $this->assertIban('DE43100500000920018963', IBANGenerator::DE('10050000', '484848'));
    }
    
    public function testGenerate_IbanForRuleDE000600() {
    	$this->assertIban('DE62701500000020228888', IBANGenerator::DE('70150000', '1111111'));
    	$this->assertIban('DE48701500000903286003', IBANGenerator::DE('70150000', '7777777'));
    	$this->assertIban('DE30701500001000506517', IBANGenerator::DE('70150000', '34343434'));
    	$this->assertIban('DE64701500000018180018', IBANGenerator::DE('70150000', '70000'));
    }
    
    public function testGenerate_IbanForRuleDE001000() {
        $this->assertIban('DE42500502010000222000', IBANGenerator::DE('50050201', '2000'));
        $this->assertIban('DE89500502010000180802', IBANGenerator::DE('50050201', '800000'));
    }
    
    public function testGenerate_IbanForRuleDE001100() {
        $generatedIban = IBANGenerator::DE('32050000', '1000');
        $this->assertEquals('DE44320500000008010001', trim($generatedIban));
        $this->assertFalse(strcmp('DE98320500000000001000', trim($generatedIban)) == 0);
        $generatedIban = IBANGenerator::DE('32050000', '47800');
        $this->assertEquals('DE36320500000000047803', trim($generatedIban));
        $this->assertFalse(strcmp('DE20320500000000047800', trim($generatedIban)) == 0);       
    }
    
    public function testGenerate_IbanForRuleDE001201() {
        $this->assertIban('DE95500500005000002096', IBANGenerator::DE('50850049', '5000002096'));
        $this->assertFalse(strcmp('DE44508500495000002096', IBANGenerator::DE('50850049', '5000002096')) == 0);
    }
    
    public function testGenerate_IbanForRuleDE001301() {
        $this->assertIban('DE15300500000000060624', IBANGenerator::DE('40050000', '60624'));
        $this->assertFalse(strcmp('DE56400500000000060624', IBANGenerator::DE('40050000', '60624')) == 0);
    }
    
    public function testGenerate_IbanForRuleDE001400() {
        $this->assertIban('DE53300606010100100100', IBANGenerator::DE('30060601', '100100100'));
        $this->assertIban('DE53300606010100100100', IBANGenerator::DE('33060616', '100100100'));
    }
    
    public function testGenerate_IbanForRuleDE001500() {
        $this->assertIban('DE75370601930000101010', IBANGenerator::DE('37060193', '556'));
        $this->assertIban('DE94370601930031870011', IBANGenerator::DE('37060193', '888'));
        $this->assertIban('DE13370601934003600101', IBANGenerator::DE('37060193', '4040'));
        $this->assertIban('DE49370601931015826017', IBANGenerator::DE('37060193', '5826'));  
        $this->assertIban('DE44370601930025000110', IBANGenerator::DE('37060193', '25000'));
        $this->assertIban('DE10370601930033013019', IBANGenerator::DE('37060193', '393393'));
        $this->assertIban('DE38370601930032230016', IBANGenerator::DE('37060193', '444555'));
        $this->assertIban('DE98370601936002919018', IBANGenerator::DE('37060193', '603060'));
        $this->assertIban('DE92370601930002130041', IBANGenerator::DE('37060193', '2120041'));
        $this->assertIban('DE42370601934007375013', IBANGenerator::DE('37060193', '80868086'));
        $this->assertIban('DE90370601934000569017', IBANGenerator::DE('37060193', '400569017'));
    }
    
    public function testGenerate_IbanForRuleDE001600() {
        $this->assertIban('DE68371600870018128012', IBANGenerator::DE('37160087', '300000'));
    }
    
    public function testGenerate_IbanForRuleDE001700() {
        $this->assertIban('DE43380601862009090013', IBANGenerator::DE('38060186', '100'));
        $this->assertIban('DE38380601862111111017', IBANGenerator::DE('38060186', '111'));
        $this->assertIban('DE77380601862100240010', IBANGenerator::DE('38060186', '240'));
        $this->assertIban('DE23380601862204004016', IBANGenerator::DE('38060186', '4004'));
        $this->assertIban('DE04380601862044444014', IBANGenerator::DE('38060186', '4444'));
        $this->assertIban('DE07380601862016060014', IBANGenerator::DE('38060186', '6060'));
        $this->assertIban('DE16380601861102030016', IBANGenerator::DE('38060186', '102030'));
        $this->assertIban('DE06380601862033333016', IBANGenerator::DE('38060186', '333333'));
        $this->assertIban('DE43380601862009090013', IBANGenerator::DE('38060186', '909090'));
        $this->assertIban('DE95380601865000500013', IBANGenerator::DE('38060186', '50005000'));
    }
    
    public function testGenerate_IbanForRuleDE001800() {
        $this->assertIban('DE05390601800120440110', IBANGenerator::DE('39060180', '556'));
        $this->assertIban('DE37390601800543543543', IBANGenerator::DE('39060180', '5435435430'));
        $this->assertIban('DE07390601800121787016', IBANGenerator::DE('39060180', '2157'));
        $this->assertIban('DE19390601800120800019', IBANGenerator::DE('39060180', '9800'));
        $this->assertIban('DE61390601801221864014', IBANGenerator::DE('39060180', '202050'));
    }
    
    public function testGenerate_IbanForRuleDE001900() {
        $this->assertIban('DE82501203830020475000', IBANGenerator::DE('50130100', '20475000'));
        $this->assertFalse(strcmp('DE95501301000020475000', IBANGenerator::DE('50130100', '20475000')) == 0);
        $this->assertIban('DE82501203830020475000', IBANGenerator::DE('50220200', '20475000'));
        $this->assertIban('DE82501203830020475000', IBANGenerator::DE('70030800', '20475000'));
    }
    
    private function assertIban($ibanExpected, $ibanActual) {
        $this->assertEquals($ibanExpected, trim($ibanActual));
    }
}
