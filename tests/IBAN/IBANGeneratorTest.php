<?php

use IBAN\Generation\IBANGenerator;
use IBAN\Rule\IBANRuleFactory;
use IBAN\Rule\DE\Rule000100;

class IBANGeneratorTest extends PHPUnit_Framework_TestCase
{
    protected $generatorTestData;
    
    protected function setUp() {
        $this->generatorTestData = file('tests/fixtures/generation.data');
    }

    protected function tearDown() {
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
            $testDataArray = explode(';', trim($testData));
            $generatedIban = IBANGenerator::DE(trim($testDataArray[1]), trim($testDataArray[2]));
            $this->assertEquals(trim($testDataArray[3]), trim($generatedIban));
        }
    }
    
    /**
     * @expectedException Exception
     */
    public function testGenerateIbanForRule000100ShouldThrowException() {
        $rule = new Rule000100('', '', '');
        $rule->generateIban();
    }
    
    public function testGenerateIbanForRuleDE000200() {
        $this->assertIban('', IBANGenerator::DE('72020700', '1000000860'));
        $this->assertIban('', IBANGenerator::DE('72020700', '1000000600'));
        $this->assertIban('DE05720207000012345678', IBANGenerator::DE('72020700', '12345678'));
    }
    
    public function testGenerateIbanForRuleDE000300() {
    	$this->assertIban('', IBANGenerator::DE('51010800', '6161604670'));
    	$this->assertIban('DE29510108000012345678', IBANGenerator::DE('51010800', '12345678'));
    }
    
    public function testGenerateIbanForRuleDE000400() {
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
    
    public function testGenerateIbanForRuleDE000600() {
    	$this->assertIban('DE62701500000020228888', IBANGenerator::DE('70150000', '1111111'));
    	$this->assertIban('DE48701500000903286003', IBANGenerator::DE('70150000', '7777777'));
    	$this->assertIban('DE30701500001000506517', IBANGenerator::DE('70150000', '34343434'));
    	$this->assertIban('DE64701500000018180018', IBANGenerator::DE('70150000', '70000'));
    }
    
    public function testGenerateIbanForRuleDE000700() {
    	$this->assertIban('DE15370501980000001115', IBANGenerator::DE('37050198', '111'));
    	$this->assertIban('DE25370501980023002157', IBANGenerator::DE('37050198', '221'));
    	$this->assertIban('DE15370501980018882068', IBANGenerator::DE('37050198', '1888'));
    	$this->assertIban('DE57370501981900668508', IBANGenerator::DE('37050198', '2006'));
    	$this->assertIban('DE41370501981900730100', IBANGenerator::DE('37050198', '2626'));
    	$this->assertIban('DE39370501981900637016', IBANGenerator::DE('37050198', '3004'));
    	$this->assertIban('DE52370501980023002447', IBANGenerator::DE('37050198', '3636'));
    	$this->assertIban('DE31370501980000004028', IBANGenerator::DE('37050198', '4000'));
    	$this->assertIban('DE12370501980000017368', IBANGenerator::DE('37050198', '4444'));
    	$this->assertIban('DE83370501980000073999', IBANGenerator::DE('37050198', '5050'));
    	$this->assertIban('DE42370501981901335750', IBANGenerator::DE('37050198', '8888'));
    	$this->assertIban('DE22370501980009992959', IBANGenerator::DE('37050198', '30000'));
    	$this->assertIban('DE56370501981901693331', IBANGenerator::DE('37050198', '43430'));
    	$this->assertIban('DE98370501981900399856', IBANGenerator::DE('37050198', '46664'));
    	$this->assertIban('DE81370501980034407379', IBANGenerator::DE('37050198', '55555'));
    	$this->assertIban('DE17370501981900480466', IBANGenerator::DE('37050198', '102030'));
    	$this->assertIban('DE64370501980057762957', IBANGenerator::DE('37050198', '151515'));
    	$this->assertIban('DE85370501980002222222', IBANGenerator::DE('37050198', '222222'));
    	$this->assertIban('DE22370501980009992959', IBANGenerator::DE('37050198', '300000'));
    	$this->assertIban('DE53370501980000033217', IBANGenerator::DE('37050198', '333333'));
    	$this->assertIban('DE83370501980000092817', IBANGenerator::DE('37050198', '414141'));
    	$this->assertIban('DE64370501980000091025', IBANGenerator::DE('37050198', '606060'));
    	$this->assertIban('DE20370501980000090944', IBANGenerator::DE('37050198', '909090'));
    	$this->assertIban('DE24370501980005602024', IBANGenerator::DE('37050198', '2602024'));
    	$this->assertIban('DE22370501980009992959', IBANGenerator::DE('37050198', '3000000'));
    	$this->assertIban('DE85370501980002222222', IBANGenerator::DE('37050198', '7777777'));
    	$this->assertIban('DE39370501980000038901', IBANGenerator::DE('37050198', '8090100'));
    	$this->assertIban('DE96370501980043597665', IBANGenerator::DE('37050198', '14141414'));
    	$this->assertIban('DE98370501980015002223', IBANGenerator::DE('37050198', '15000023'));
    	$this->assertIban('DE64370501980057762957', IBANGenerator::DE('37050198', '15151515'));
    	$this->assertIban('DE85370501980002222222', IBANGenerator::DE('37050198', '22222222'));
    	$this->assertIban('DE54370501981901783868', IBANGenerator::DE('37050198', '200820082'));
    	$this->assertIban('DE85370501980002222222', IBANGenerator::DE('37050198', '222220022'));
    }
    
    public function testGenerateIbanForRuleDE000800() {
    	$this->assertIban('DE80500202000000038000', IBANGenerator::DE('50020200', '38000'));
		$this->assertIban('DE46500202000030009963', IBANGenerator::DE('51020000', '30009963'));
    	$this->assertFalse(strcmp('DE05510200000030009963', IBANGenerator::DE('51020000', '30009963')) == 0);
		$this->assertIban('DE02500202000040033086', IBANGenerator::DE('30020500', '40033086'));
    	$this->assertFalse(strcmp('DE41300205000040033086', IBANGenerator::DE('30020500', '40033086')) == 0);
    	$this->assertIban('DE55500202000050017409', IBANGenerator::DE('20120200', '50017409'));
    	$this->assertFalse(strcmp('DE75201202000050017409', IBANGenerator::DE('20120200', '50017409')) == 0);
    	$this->assertIban('DE38500202000055036107', IBANGenerator::DE('70220200', '55036107'));
    	$this->assertFalse(strcmp('DE18702202000055036107', IBANGenerator::DE('70220200', '55036107')) == 0);
    	$this->assertIban('DE98500202000070049754', IBANGenerator::DE('10020200', '70049754'));
    	$this->assertFalse(strcmp('DE31100202000070049754', IBANGenerator::DE('10020200', '70049754')) == 0);
    }
    
    public function testGenerateIbanRuleDE000900() {
    	$this->assertIban('DE03683515573047232594', IBANGenerator::DE('68351976', '1116232594'));
    	$this->assertIban('DE10683515570016005845', IBANGenerator::DE('68351976', '0016005845'));
    }
    
    public function testGenerateIbanForRuleDE001000() {
        $this->assertIban('DE42500502010000222000', IBANGenerator::DE('50050201', '2000'));
        $this->assertIban('DE89500502010000180802', IBANGenerator::DE('50050201', '800000'));
    }
    
    public function testGenerateIbanForRuleDE001100() {
        $generatedIban = IBANGenerator::DE('32050000', '1000');
        $this->assertEquals('DE44320500000008010001', trim($generatedIban));
        $this->assertFalse(strcmp('DE98320500000000001000', trim($generatedIban)) == 0);
        $generatedIban = IBANGenerator::DE('32050000', '47800');
        $this->assertEquals('DE36320500000000047803', trim($generatedIban));
        $this->assertFalse(strcmp('DE20320500000000047800', trim($generatedIban)) == 0);       
    }
    
    public function testGenerateIbanForRuleDE001201() {
        $this->assertIban('DE95500500005000002096', IBANGenerator::DE('50850049', '5000002096'));
        $this->assertFalse(strcmp('DE44508500495000002096', IBANGenerator::DE('50850049', '5000002096')) == 0);
    }
    
    public function testGenerateIbanForRuleDE001301() {
        $this->assertIban('DE15300500000000060624', IBANGenerator::DE('40050000', '60624'));
        $this->assertFalse(strcmp('DE56400500000000060624', IBANGenerator::DE('40050000', '60624')) == 0);
    }
    
    public function testGenerateIbanForRuleDE001400() {
        $this->assertIban('DE53300606010100100100', IBANGenerator::DE('30060601', '100100100'));
        $this->assertIban('DE53300606010100100100', IBANGenerator::DE('33060616', '100100100'));
    }
    
    public function testGenerateIbanForRuleDE001500() {
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
    
    public function testGenerateIbanForRuleDE001600() {
        $this->assertIban('DE68371600870018128012', IBANGenerator::DE('37160087', '300000'));
    }
    
    public function testGenerateIbanForRuleDE001700() {
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
    
    public function testGenerateIbanForRuleDE001800() {
        $this->assertIban('DE05390601800120440110', IBANGenerator::DE('39060180', '556'));
        $this->assertIban('DE37390601800543543543', IBANGenerator::DE('39060180', '5435435430'));
        $this->assertIban('DE07390601800121787016', IBANGenerator::DE('39060180', '2157'));
        $this->assertIban('DE19390601800120800019', IBANGenerator::DE('39060180', '9800'));
        $this->assertIban('DE61390601801221864014', IBANGenerator::DE('39060180', '202050'));
    }
    
    public function testGenerateIbanForRuleDE001900() {
        $this->assertIban('DE82501203830020475000', IBANGenerator::DE('50130100', '20475000'));
        $this->assertFalse(strcmp('DE95501301000020475000', IBANGenerator::DE('50130100', '20475000')) == 0);
        $this->assertIban('DE82501203830020475000', IBANGenerator::DE('50220200', '20475000'));
        $this->assertIban('DE82501203830020475000', IBANGenerator::DE('70030800', '20475000'));
    }
    
    public function testGenerateIbanForRuleDE002101() {
    	$this->assertIban('DE81360200300000305200', IBANGenerator::DE('35020030', '305200'));
    	$this->assertFalse(strcmp('DE09350200300000305200', IBANGenerator::DE('35020030', '305200')) == 0);
    	$this->assertIban('DE03360200300000900826', IBANGenerator::DE('35020030', '900826'));
    	$this->assertFalse(strcmp('DE95360200300000900826', IBANGenerator::DE('35020030', '900826')) == 0);
    	$this->assertIban('DE71360200300000705020', IBANGenerator::DE('35020030', '705020'));
    	$this->assertFalse(strcmp('DE10365200300000705020', IBANGenerator::DE('35020030', '705020')) == 0);
    	$this->assertIban('DE18360200300009197354', IBANGenerator::DE('35020030', '9197354'));	
    }
    
    public function testGenerateIbanForRuleDE002200() {
    	$this->assertIban('DE22430609672222200000', IBANGenerator::DE('43060967', '1111111'));
    }
    
    public function testGenerateIbanForRuleDE002300() {
    	$this->assertIban('DE76265900251000700800', IBANGenerator::DE('26590025', '700'));
    }
    
    public function testGenerateIbanForRuleDE002400() {
    	$this->assertIban('DE48360602950000001694', IBANGenerator::DE('36060295', '94'));
    	$this->assertIban('DE03360602950000017248', IBANGenerator::DE('36060295', '248'));
    	$this->assertIban('DE03360602950000017345', IBANGenerator::DE('36060295', '345'));
    	$this->assertIban('DE75360602950000014400', IBANGenerator::DE('36060295', '400'));
    }
    
    public function testGenerateIbanForRuleDE002500() {
    	$this->assertIban('DE81600501010002777939', IBANGenerator::DE('64150182', '2777939'));
    	$this->assertIban('DE80600501017893500686', IBANGenerator::DE('64450288', '7893500686'));    	 
    }
    
    public function testGenerateIbanForRuleDE002600() {
    	$this->assertIban('DE21350601900000055111', IBANGenerator::DE('35060190', '55111'));
    	$this->assertIban('DE86350601900008090100', IBANGenerator::DE('35060190', '8090100'));
    }
    
    public function testGenerateIbanForRuleDE002700() {
    	$this->assertIban('DE47320603620000003333', IBANGenerator::DE('32060362', '3333'));
    	$this->assertIban('DE23320603620000004444', IBANGenerator::DE('32060362', '4444'));
    }
    
    public function testGenerateIbanForRuleDE002800() {
    	$this->assertIban('DE69250501800000017095', IBANGenerator::DE('25050299', '17095'));
    }
    
    public function testGenerateIbanForRuleDE002900() {
    	$this->assertIban('DE02512108000260123456', IBANGenerator::DE('51210800', '2600123456'));
    	$this->assertIban('DE35512108000141123456', IBANGenerator::DE('51210800', '1410123456'));
    }
    
    public function testGenerateIbanForRuleDE003700() {
    	$this->assertIban('DE41300107000000123456', IBANGenerator::DE('20110700', '0000123456'));
    	$this->assertIban('DE85300107000000654321', IBANGenerator::DE('30010700', '0000654321'));
    }
    
    public function testGenerateIbanForRuleDE003800() {
    	$this->assertIban('DE22285900750000654321', IBANGenerator::DE('26691213', '0000654321'));
    	$this->assertIban('DE22285900750000654321', IBANGenerator::DE('28591579', '0000654321'));
    	$this->assertIban('DE22285900750000654321', IBANGenerator::DE('25090300', '0000654321'));
    }
    
    public function testGenerateIbanForRuleDE005100() {
    	$this->assertIban('DE96600501017832500881', IBANGenerator::DE('60050101', '0000000333'));
    	$this->assertIban('DE15600501010001108884', IBANGenerator::DE('60050101', '0000000502'));
    	$this->assertIban('DE25600501010005005000', IBANGenerator::DE('60050101', '0500500500'));
    	$this->assertIban('DE15600501010001108884', IBANGenerator::DE('60050101', '0502502502'));
    }
    
    private function assertIban($ibanExpected, $ibanActual) {
        $this->assertEquals($ibanExpected, trim($ibanActual));
    }
}
