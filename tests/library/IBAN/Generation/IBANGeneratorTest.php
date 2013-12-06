<?php

namespace IBAN\Generation;

use IBAN\Generation\IBANGenerator;
use IBAN\Rule\DE\Rule000100;
use IBAN\Rule\RuleFactory;

class IBANGeneratorTest extends \PHPUnit_Framework_TestCase
{
    protected static $generatorTestData;
    protected static $deIBANGenerator;

    public static function setUpBeforeClass()
    {
        self::$generatorTestData = file('tests/data/generation.data');
        self::$deIBANGenerator = new IBANGenerator(new RuleFactory('DE'));
    }

    public static function tearDownAfterClass()
    {
        self::$generatorTestData = null;
        self::$deIBANGenerator = null;
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingInstituteIdentification()
    {
        self::$deIBANGenerator->generate('', '');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGenerate_throwsInvalidArgumentExceptionOnMissingBankAccountNumber()
    {
        self::$deIBANGenerator->generate('50010517', '');
    }

    public function testGenerate_ValidIban()
    {
        foreach (self::$generatorTestData as $testData) {
            $testDataArray = explode(';', trim($testData));
            $generatedIban = self::$deIBANGenerator->generate(trim($testDataArray[1]), trim($testDataArray[2]));
            $this->assertEquals(trim($testDataArray[3]), trim($generatedIban));
        }
    }

    public function testNormalizeInput()
    {
        $this->assertIban('DE05720207000012345678', self::$deIBANGenerator->generate('720 207 00', '12 34 56 78'));
    }

    /**
     * @expectedException Exception
     */
    public function testGenerateIbanForRule000100ShouldThrowException()
    {
        $rule = new Rule000100('', '', '');
        $rule->generateIban();
    }

    public function testGenerateIbanForRuleDE000200()
    {
        $this->assertIban('', self::$deIBANGenerator->generate('72020700', '1000000860'));
        $this->assertIban('', self::$deIBANGenerator->generate('72020700', '1000000600'));
        $this->assertIban('DE05720207000012345678', self::$deIBANGenerator->generate('72020700', '12345678'));
    }

    public function testGenerateIbanForRuleDE000300()
    {
        $this->assertIban('', self::$deIBANGenerator->generate('51010800', '6161604670'));
        $this->assertIban('DE29510108000012345678', self::$deIBANGenerator->generate('51010800', '12345678'));
    }

    public function testGenerateIbanForRuleDE000400()
    {
        $this->assertIban('DE86100500000990021440', self::$deIBANGenerator->generate('10050000', '135'));
        $this->assertIban('DE19100500006600012020', self::$deIBANGenerator->generate('10050000', '1111'));
        $this->assertIban('DE73100500000920019005', self::$deIBANGenerator->generate('10050000', '1900'));
        $this->assertIban('DE48100500000780008006', self::$deIBANGenerator->generate('10050000', '7878'));
        $this->assertIban('DE43100500000250030942', self::$deIBANGenerator->generate('10050000', '8888'));
        $this->assertIban('DE60100500001653524703', self::$deIBANGenerator->generate('10050000', '9595'));
        $this->assertIban('DE15100500000013044150', self::$deIBANGenerator->generate('10050000', '97097'));
        $this->assertIban('DE54100500000630025819', self::$deIBANGenerator->generate('10050000', '112233'));
        $this->assertIban('DE22100500006604058903', self::$deIBANGenerator->generate('10050000', '336666'));
        $this->assertIban('DE43100500000920018963', self::$deIBANGenerator->generate('10050000', '484848'));
    }

    public function testGenerateIbanForRuleDE000502()
    {
        $this->assertIban('DE32265800700732502200', self::$deIBANGenerator->generate('26580070', '732502200'));
        $this->assertIban('DE60265800708732502200', self::$deIBANGenerator->generate('26580070', '8732502200'));
        $this->assertIban('DE37265800704820379900', self::$deIBANGenerator->generate('26580070', '4820379900'));
        $this->assertIban('DE77500800006814706100', self::$deIBANGenerator->generate('50080000', '6814706100'));
        $this->assertIban('DE39500800009814706100', self::$deIBANGenerator->generate('50080000', '9814706100'));
        $this->assertIban('', self::$deIBANGenerator->generate('12080000', '998761700'));
        $this->assertIban('', self::$deIBANGenerator->generate('70045050', '930125007'));
        $this->assertIban('DE81200411110130023500', self::$deIBANGenerator->generate('20041111', '130023500'));
    }

    public function testGenerateIbanForRuleDE000600()
    {
        $this->assertIban('DE62701500000020228888', self::$deIBANGenerator->generate('70150000', '1111111'));
        $this->assertIban('DE48701500000903286003', self::$deIBANGenerator->generate('70150000', '7777777'));
        $this->assertIban('DE30701500001000506517', self::$deIBANGenerator->generate('70150000', '34343434'));
        $this->assertIban('DE64701500000018180018', self::$deIBANGenerator->generate('70150000', '70000'));
    }

    public function testGenerateIbanForRuleDE000700()
    {
        $this->assertIban('DE15370501980000001115', self::$deIBANGenerator->generate('37050198', '111'));
        $this->assertIban('DE25370501980023002157', self::$deIBANGenerator->generate('37050198', '221'));
        $this->assertIban('DE15370501980018882068', self::$deIBANGenerator->generate('37050198', '1888'));
        $this->assertIban('DE57370501981900668508', self::$deIBANGenerator->generate('37050198', '2006'));
        $this->assertIban('DE41370501981900730100', self::$deIBANGenerator->generate('37050198', '2626'));
        $this->assertIban('DE39370501981900637016', self::$deIBANGenerator->generate('37050198', '3004'));
        $this->assertIban('DE52370501980023002447', self::$deIBANGenerator->generate('37050198', '3636'));
        $this->assertIban('DE31370501980000004028', self::$deIBANGenerator->generate('37050198', '4000'));
        $this->assertIban('DE12370501980000017368', self::$deIBANGenerator->generate('37050198', '4444'));
        $this->assertIban('DE83370501980000073999', self::$deIBANGenerator->generate('37050198', '5050'));
        $this->assertIban('DE42370501981901335750', self::$deIBANGenerator->generate('37050198', '8888'));
        $this->assertIban('DE22370501980009992959', self::$deIBANGenerator->generate('37050198', '30000'));
        $this->assertIban('DE56370501981901693331', self::$deIBANGenerator->generate('37050198', '43430'));
        $this->assertIban('DE98370501981900399856', self::$deIBANGenerator->generate('37050198', '46664'));
        $this->assertIban('DE81370501980034407379', self::$deIBANGenerator->generate('37050198', '55555'));
        $this->assertIban('DE17370501981900480466', self::$deIBANGenerator->generate('37050198', '102030'));
        $this->assertIban('DE64370501980057762957', self::$deIBANGenerator->generate('37050198', '151515'));
        $this->assertIban('DE85370501980002222222', self::$deIBANGenerator->generate('37050198', '222222'));
        $this->assertIban('DE22370501980009992959', self::$deIBANGenerator->generate('37050198', '300000'));
        $this->assertIban('DE53370501980000033217', self::$deIBANGenerator->generate('37050198', '333333'));
        $this->assertIban('DE83370501980000092817', self::$deIBANGenerator->generate('37050198', '414141'));
        $this->assertIban('DE64370501980000091025', self::$deIBANGenerator->generate('37050198', '606060'));
        $this->assertIban('DE20370501980000090944', self::$deIBANGenerator->generate('37050198', '909090'));
        $this->assertIban('DE24370501980005602024', self::$deIBANGenerator->generate('37050198', '2602024'));
        $this->assertIban('DE22370501980009992959', self::$deIBANGenerator->generate('37050198', '3000000'));
        $this->assertIban('DE85370501980002222222', self::$deIBANGenerator->generate('37050198', '7777777'));
        $this->assertIban('DE39370501980000038901', self::$deIBANGenerator->generate('37050198', '8090100'));
        $this->assertIban('DE96370501980043597665', self::$deIBANGenerator->generate('37050198', '14141414'));
        $this->assertIban('DE98370501980015002223', self::$deIBANGenerator->generate('37050198', '15000023'));
        $this->assertIban('DE64370501980057762957', self::$deIBANGenerator->generate('37050198', '15151515'));
        $this->assertIban('DE85370501980002222222', self::$deIBANGenerator->generate('37050198', '22222222'));
        $this->assertIban('DE54370501981901783868', self::$deIBANGenerator->generate('37050198', '200820082'));
        $this->assertIban('DE85370501980002222222', self::$deIBANGenerator->generate('37050198', '222220022'));
    }

    public function testGenerateIbanForRuleDE000800()
    {
        $this->assertIban('DE80500202000000038000', self::$deIBANGenerator->generate('50020200', '38000'));
        $this->assertIban('DE46500202000030009963', self::$deIBANGenerator->generate('51020000', '30009963'));
        $this->assertFalse(strcmp('DE05510200000030009963', self::$deIBANGenerator->generate('51020000', '30009963')) == 0);
        $this->assertIban('DE02500202000040033086', self::$deIBANGenerator->generate('30020500', '40033086'));
        $this->assertFalse(strcmp('DE41300205000040033086', self::$deIBANGenerator->generate('30020500', '40033086')) == 0);
        $this->assertIban('DE55500202000050017409', self::$deIBANGenerator->generate('20120200', '50017409'));
        $this->assertFalse(strcmp('DE75201202000050017409', self::$deIBANGenerator->generate('20120200', '50017409')) == 0);
        $this->assertIban('DE38500202000055036107', self::$deIBANGenerator->generate('70220200', '55036107'));
        $this->assertFalse(strcmp('DE18702202000055036107', self::$deIBANGenerator->generate('70220200', '55036107')) == 0);
        $this->assertIban('DE98500202000070049754', self::$deIBANGenerator->generate('10020200', '70049754'));
        $this->assertFalse(strcmp('DE31100202000070049754', self::$deIBANGenerator->generate('10020200', '70049754')) == 0);
    }

    public function testGenerateIbanForRuleDE000900()
    {
        // $this->assertIban('DE03683515573047232594', self::$deIBANGenerator->generate('68351976', '1116232594')); // successor blz is active 68351557
        $this->assertIban('DE38683515571116232594', self::$deIBANGenerator->generate('68351976', '1116232594')); // successor blz is active 68351557
        $this->assertIban('DE10683515570016005845', self::$deIBANGenerator->generate('68351976', '0016005845'));
    }

    public function testGenerateIbanForRuleDE001001()
    {
        $this->assertIban('DE42500502010000222000', self::$deIBANGenerator->generate('50050201', '2000'));
        $this->assertIban('DE89500502010000180802', self::$deIBANGenerator->generate('50050201', '800000'));
        $this->assertIban('DE45500502011241539870', self::$deIBANGenerator->generate('50050222', '1241539870'));
    }

    public function testGenerateIbanForRuleDE001100()
    {
        $generatedIban = self::$deIBANGenerator->generate('32050000', '1000');
        $this->assertEquals('DE44320500000008010001', trim($generatedIban));
        $this->assertFalse(strcmp('DE98320500000000001000', trim($generatedIban)) == 0);
        $generatedIban = self::$deIBANGenerator->generate('32050000', '47800');
        $this->assertEquals('DE36320500000000047803', trim($generatedIban));
        $this->assertFalse(strcmp('DE20320500000000047800', trim($generatedIban)) == 0);
    }

    public function testGenerateIbanForRuleDE001201()
    {
        $this->assertIban('DE95500500005000002096', self::$deIBANGenerator->generate('50850049', '5000002096'));
        $this->assertFalse(strcmp('DE44508500495000002096', self::$deIBANGenerator->generate('50850049', '5000002096')) == 0);
    }

    public function testGenerateIbanForRuleDE001301()
    {
        $this->assertIban('DE15300500000000060624', self::$deIBANGenerator->generate('40050000', '60624'));
        $this->assertFalse(strcmp('DE56400500000000060624', self::$deIBANGenerator->generate('40050000', '60624')) == 0);
    }

    public function testGenerateIbanForRuleDE001400()
    {
        $this->assertIban('DE53300606010100100100', self::$deIBANGenerator->generate('30060601', '100100100'));
        $this->assertIban('DE53300606010100100100', self::$deIBANGenerator->generate('33060616', '100100100'));
    }

    public function testGenerateIbanForRuleDE001501()
    {
        $this->assertIban('DE75370601930000101010', self::$deIBANGenerator->generate('37060193', '556'));
        $this->assertIban('DE94370601930031870011', self::$deIBANGenerator->generate('37060193', '888'));
        $this->assertIban('DE13370601934003600101', self::$deIBANGenerator->generate('37060193', '4040'));
        $this->assertIban('DE49370601931015826017', self::$deIBANGenerator->generate('37060193', '5826'));
        $this->assertIban('DE44370601930025000110', self::$deIBANGenerator->generate('37060193', '25000'));
        $this->assertIban('DE10370601930033013019', self::$deIBANGenerator->generate('37060193', '393393'));
        $this->assertIban('DE38370601930032230016', self::$deIBANGenerator->generate('37060193', '444555'));
        $this->assertIban('DE98370601936002919018', self::$deIBANGenerator->generate('37060193', '603060'));
        $this->assertIban('DE92370601930002130041', self::$deIBANGenerator->generate('37060193', '2120041'));
        $this->assertIban('DE42370601934007375013', self::$deIBANGenerator->generate('37060193', '80868086'));
        $this->assertIban('DE90370601934000569017', self::$deIBANGenerator->generate('37060193', '400569017'));
    }

    public function testGenerateIbanForRuleDE001600()
    {
        $this->assertIban('DE68371600870018128012', self::$deIBANGenerator->generate('37160087', '300000'));
    }

    public function testGenerateIbanForRuleDE001700()
    {
        $this->assertIban('DE43380601862009090013', self::$deIBANGenerator->generate('38060186', '100'));
        $this->assertIban('DE38380601862111111017', self::$deIBANGenerator->generate('38060186', '111'));
        $this->assertIban('DE77380601862100240010', self::$deIBANGenerator->generate('38060186', '240'));
        $this->assertIban('DE23380601862204004016', self::$deIBANGenerator->generate('38060186', '4004'));
        $this->assertIban('DE04380601862044444014', self::$deIBANGenerator->generate('38060186', '4444'));
        $this->assertIban('DE07380601862016060014', self::$deIBANGenerator->generate('38060186', '6060'));
        $this->assertIban('DE16380601861102030016', self::$deIBANGenerator->generate('38060186', '102030'));
        $this->assertIban('DE06380601862033333016', self::$deIBANGenerator->generate('38060186', '333333'));
        $this->assertIban('DE43380601862009090013', self::$deIBANGenerator->generate('38060186', '909090'));
        $this->assertIban('DE95380601865000500013', self::$deIBANGenerator->generate('38060186', '50005000'));
    }

    public function testGenerateIbanForRuleDE001800()
    {
        $this->assertIban('DE05390601800120440110', self::$deIBANGenerator->generate('39060180', '556'));
        $this->assertIban('DE37390601800543543543', self::$deIBANGenerator->generate('39060180', '5435435430'));
        $this->assertIban('DE07390601800121787016', self::$deIBANGenerator->generate('39060180', '2157'));
        $this->assertIban('DE19390601800120800019', self::$deIBANGenerator->generate('39060180', '9800'));
        $this->assertIban('DE61390601801221864014', self::$deIBANGenerator->generate('39060180', '202050'));
    }

    public function testGenerateIbanForRuleDE001900()
    {
        $this->assertIban('DE82501203830020475000', self::$deIBANGenerator->generate('50130100', '20475000'));
        $this->assertFalse(strcmp('DE95501301000020475000', self::$deIBANGenerator->generate('50130100', '20475000')) == 0);
        $this->assertIban('DE82501203830020475000', self::$deIBANGenerator->generate('50220200', '20475000'));
        $this->assertIban('DE82501203830020475000', self::$deIBANGenerator->generate('70030800', '20475000'));
    }

    public function testGenerateIbanForRuleDE002001()
    {
        $this->assertIban('DE04500700100350002200', self::$deIBANGenerator->generate('50070010', '3500022'));
    }

    public function testGenerateIbanForRuleDE002101()
    {
        $this->assertIban('DE81360200300000305200', self::$deIBANGenerator->generate('35020030', '305200'));
        $this->assertFalse(strcmp('DE09350200300000305200', self::$deIBANGenerator->generate('35020030', '305200')) == 0);
        $this->assertIban('DE03360200300000900826', self::$deIBANGenerator->generate('35020030', '900826'));
        $this->assertFalse(strcmp('DE95360200300000900826', self::$deIBANGenerator->generate('35020030', '900826')) == 0);
        $this->assertIban('DE71360200300000705020', self::$deIBANGenerator->generate('35020030', '705020'));
        $this->assertFalse(strcmp('DE10365200300000705020', self::$deIBANGenerator->generate('35020030', '705020')) == 0);
        $this->assertIban('DE18360200300009197354', self::$deIBANGenerator->generate('35020030', '9197354'));
    }

    public function testGenerateIbanForRuleDE002200()
    {
        $this->assertIban('DE22430609672222200000', self::$deIBANGenerator->generate('43060967', '1111111'));
    }

    public function testGenerateIbanForRuleDE002300()
    {
        $this->assertIban('DE76265900251000700800', self::$deIBANGenerator->generate('26590025', '700'));
    }

    public function testGenerateIbanForRuleDE002400()
    {
        $this->assertIban('DE48360602950000001694', self::$deIBANGenerator->generate('36060295', '94'));
        $this->assertIban('DE03360602950000017248', self::$deIBANGenerator->generate('36060295', '248'));
        $this->assertIban('DE03360602950000017345', self::$deIBANGenerator->generate('36060295', '345'));
        $this->assertIban('DE75360602950000014400', self::$deIBANGenerator->generate('36060295', '400'));
    }

    public function testGenerateIbanForRuleDE002500()
    {
        $this->assertIban('DE81600501010002777939', self::$deIBANGenerator->generate('64150182', '2777939'));
        $this->assertIban('DE80600501017893500686', self::$deIBANGenerator->generate('64450288', '7893500686'));
    }

    public function testGenerateIbanForRuleDE002600()
    {
        $this->assertIban('DE21350601900000055111', self::$deIBANGenerator->generate('35060190', '55111'));
        $this->assertIban('DE86350601900008090100', self::$deIBANGenerator->generate('35060190', '8090100'));
    }

    public function testGenerateIbanForRuleDE002700()
    {
        $this->assertIban('DE47320603620000003333', self::$deIBANGenerator->generate('32060362', '3333'));
        $this->assertIban('DE23320603620000004444', self::$deIBANGenerator->generate('32060362', '4444'));
    }

    public function testGenerateIbanForRuleDE002800()
    {
        $this->assertIban('DE69250501800000017095', self::$deIBANGenerator->generate('25050299', '17095'));
    }

    public function testGenerateIbanForRuleDE002900()
    {
        $this->assertIban('DE02512108000260123456', self::$deIBANGenerator->generate('51210800', '2600123456'));
        $this->assertIban('DE35512108000141123456', self::$deIBANGenerator->generate('51210800', '1410123456'));
    }

    public function testGenerateIbanForRuleDE003000()
    {
        # no example
    }

    public function testGenerateIbanForRuleDE003101()
    {
        //$this->assertIban('', self::$deIBANGenerator->generate('10120760', '897'));
        // Next_BLC necessary
        // $this->assertIban('DE70762200731210100047', self::$deIBANGenerator->generate('79020325', '1210100047'));
        // $this->assertIban('DE70762200731210100047', self::$deIBANGenerator->generate('70020001', '1210100047'));
        // $this->assertIban('DE70762200731210100047', self::$deIBANGenerator->generate('70020001', '1210100047'));
    }

    public function testGenerateIbanForRuleDE003200()
    {
        $this->assertIban('DE70762200731210100047', self::$deIBANGenerator->generate('76220073', '1210100047'));
        $this->assertIban('DE92660202861457032621', self::$deIBANGenerator->generate('66020286', '1457032621'));
        // $this->assertIban('DE06710221823200000012', self::$deIBANGenerator->generate('76220073', '3200000012')); # Next_BLC necessary
    }

    public function testGenerateIbanForRuleDE003300()
    {
        $this->assertIban('DE11700202705803435253', self::$deIBANGenerator->generate('70020270', '22222'));
        $this->assertIban('DE88700202700039908140', self::$deIBANGenerator->generate('70020270', '1111111'));
        $this->assertIban('DE83700202700002711931', self::$deIBANGenerator->generate('70020270', '94'));
        $this->assertIban('DE40700202705800522694', self::$deIBANGenerator->generate('70020270', '7777777'));
        $this->assertIban('DE36700202700847321750', self::$deIBANGenerator->generate('70020270', '847321750'));
           $this->assertIban('DE36700202700847321750', self::$deIBANGenerator->generate('70020270', '847321750'));
    }

    public function testGenerateIbanForRuleDE003400()
    {
        $this->assertIban('DE82600202904340111112', self::$deIBANGenerator->generate('60020290', '500500500'));
        $this->assertIban('', self::$deIBANGenerator->generate('60020290', '847321750'));
    }

    public function testGenerateIbanForRuleDE003500()
    {
        $this->assertIban('DE29790200761490196966', self::$deIBANGenerator->generate('79020076', '9696'));
        $this->assertIban('', self::$deIBANGenerator->generate('79020076', '847321750'));
    }

    public function testGenerateIbanForRuleDE003600()
    {
        $this->assertIban('DE32210500000101105000', self::$deIBANGenerator->generate('21050000', '101105'));
        $this->assertIban('DE32210500000101105000', self::$deIBANGenerator->generate('20050000', '101105'));
        $this->assertIban('DE91210500000840132000', self::$deIBANGenerator->generate('21050000', '840132'));
        $this->assertIban('DE81210500000631879000', self::$deIBANGenerator->generate('21050000', '631879'));
        $this->assertIban('DE75210500000030000025', self::$deIBANGenerator->generate('21050000', '30000025'));
        $this->assertIban('DE76210500000051300528', self::$deIBANGenerator->generate('21050000', '51300528'));
        $this->assertIban('DE76210500000051300528', self::$deIBANGenerator->generate('21050000', '51300528'));
        $this->assertIban('', self::$deIBANGenerator->generate('21050000', '69999999'));
        $this->assertIban('DE85210500000100271010', self::$deIBANGenerator->generate('21050000', '100271010'));
        $this->assertIban('DE55210500000319574000', self::$deIBANGenerator->generate('21050000', '319574000'));
        $this->assertIban('', self::$deIBANGenerator->generate('21050000', '8600002000'));
    }

    public function testGenerateIbanForRuleDE003700()
    {
        $this->assertIban('DE41300107000000123456', self::$deIBANGenerator->generate('20110700', '0000123456'));
        $this->assertIban('DE85300107000000654321', self::$deIBANGenerator->generate('30010700', '0000654321'));
    }

    public function testGenerateIbanForRuleDE003800()
    {
        $this->assertIban('DE22285900750000654321', self::$deIBANGenerator->generate('26691213', '0000654321'));
        $this->assertIban('DE22285900750000654321', self::$deIBANGenerator->generate('28591579', '0000654321'));
        $this->assertIban('DE22285900750000654321', self::$deIBANGenerator->generate('25090300', '0000654321'));
    }

    public function testGenerateIbanForRuleDE003900()
    {
        // no examples
    }

    public function testGenerateIbanForRuleDE004001()
    {
        $this->assertIban('DE17680523280006015002', self::$deIBANGenerator->generate('68051310', '6015002'));
    }

    public function testGenerateIbanForRuleDE004100()
    {
        $this->assertIban('DE96500604000000011404', self::$deIBANGenerator->generate('62220000', '0062220000'));
        $this->assertIban('DE96500604000000011404', self::$deIBANGenerator->generate('62220000', '1234567890'));
    }

    public function testGenerateIbanForRuleDE004200()
    {
        $this->assertIban('', self::$deIBANGenerator->generate('66000000', '12345'));
        $this->assertIban('', self::$deIBANGenerator->generate('66000000', '12300123'));
        $this->assertIban('DE79660000000050462100', self::$deIBANGenerator->generate('66000000', '50462100'));
        $this->assertIban('DE82660000000050402100', self::$deIBANGenerator->generate('66000000', '50402100'));
    }

    public function testGenerateIbanForRuleDE004300()
    {
        $this->assertIban('DE49666500850000000868', self::$deIBANGenerator->generate('60651070', '868'));
        $this->assertIban('DE33666500850000012602', self::$deIBANGenerator->generate('60651070', '12602'));
    }

    public function testGenerateIbanForRuleDE004400()
    {
        $this->assertIban('DE51680501010002282022', self::$deIBANGenerator->generate('68050101', '202'));
    }

    public function testGenerateIbanForRuleDE004500()
    {
        // no examples
    }

    public function testGenerateIbanForRuleDE004600()
    {
        $this->assertIban('DE62310108331234567890', self::$deIBANGenerator->generate('25020600', '1234567890'));
    }

    public function testGenerateIbanForRuleDE004700()
    {
        $this->assertIban('DE74701333001234567800', self::$deIBANGenerator->generate('70133300', '12345678'));
        $this->assertIban('DE62701333000123456781', self::$deIBANGenerator->generate('70133300', '123456781'));
    }

    public function testGenerateIbanForRuleDE004800()
    {
        $this->assertIban('DE12360102001231234567', self::$deIBANGenerator->generate('10120800', '1231234567'));
        $this->assertFalse(strcmp('DE04102208001231234567', self::$deIBANGenerator->generate('10120800', '1231234567')) == 0);
        $this->assertIban('DE12360102001231234567', self::$deIBANGenerator->generate('27010200', '1231234567'));
        $this->assertIban('DE12360102001231234567', self::$deIBANGenerator->generate('60020300', '1231234567'));
    }

    public function testGenerateIbanForRuleDE004900()
    {
        $this->assertIban('DE26300600109911820001', self::$deIBANGenerator->generate('30060010', '0001991182'));
        $this->assertFalse(strcmp('DE19300600100001991182', self::$deIBANGenerator->generate('30060010', '0001991182')) == 0);
    }

    public function testGenerateIbanForRuleDE005000()
    {
        //$this->assertIban('DE24285500000130084981', self::$deIBANGenerator->generate('28252760', '0130084981')); // obviously not in bankleitzahlendatei
    }

    public function testGenerateIbanForRuleDE005100()
    {
        $this->assertIban('DE96600501017832500881', self::$deIBANGenerator->generate('60050101', '0000000333'));
        $this->assertIban('DE15600501010001108884', self::$deIBANGenerator->generate('60050101', '0000000502'));
        $this->assertIban('DE25600501010005005000', self::$deIBANGenerator->generate('60050101', '0500500500'));
        $this->assertIban('DE15600501010001108884', self::$deIBANGenerator->generate('60050101', '0502502502'));
    }

    public function testGenerateIbanForRuleDE005200()
    {
        $this->assertIban('DE38600501010002662604', self::$deIBANGenerator->generate('67220020', '5308810004'));
    }

    public function testGenerateIbanForRuleDE005300()
    {
        $this->assertIban('DE94600501017401555913', self::$deIBANGenerator->generate('55050000', '35000'));
    }

    public function testGenerateIbanForRuleDE005400()
    {
        // no examples
    }

    public function testGenerateIbanForRuleDE005500()
    {
        $this->assertIban('DE47254102007456123400', self::$deIBANGenerator->generate('25410300', '7456123400'));
        $this->assertFalse(strcmp('DE55254103007456123400', self::$deIBANGenerator->generate('25410300', '7456123400')) == 0);
    }

    public function testGenerateIbanForRuleDE005600()
    {
        $this->assertIban('DE29380101111010240003', self::$deIBANGenerator->generate('38010111', '36'));
        $this->assertIban('DE55480101111328506100', self::$deIBANGenerator->generate('48010111', '50'));
        $this->assertIban('DE26430101111826063000', self::$deIBANGenerator->generate('43010111', '99'));
        $this->assertIban('DE52250101111015597802', self::$deIBANGenerator->generate('25010111', '110'));
        $this->assertIban('DE13380101111010240000', self::$deIBANGenerator->generate('38010111', '240'));
        $this->assertIban('DE15380101111011296100', self::$deIBANGenerator->generate('38010111', '333'));
        $this->assertIban('DE54100101111600220800', self::$deIBANGenerator->generate('10010111', '555'));
        $this->assertIban('DE42390101111000556100', self::$deIBANGenerator->generate('39010111', '556'));
        $this->assertIban('DE70250101111967153801', self::$deIBANGenerator->generate('25010111', '606'));
        $this->assertIban('DE92265101111070088000', self::$deIBANGenerator->generate('26510111', '700'));
        $this->assertIban('DE72250101111006015200', self::$deIBANGenerator->generate('25010111', '777'));
        $this->assertIban('DE83380101111010240001', self::$deIBANGenerator->generate('38010111', '999'));
        $this->assertIban('DE91250101111369152400', self::$deIBANGenerator->generate('25010111', '1234'));
        $this->assertIban('DE48570101111017500000', self::$deIBANGenerator->generate('57010111', '1313'));
        $this->assertIban('DE81370101111241113000', self::$deIBANGenerator->generate('37010111', '1888'));
        $this->assertIban('DE30250101111026500901', self::$deIBANGenerator->generate('25010111', '1953'));
        $this->assertIban('DE47670101111547620500', self::$deIBANGenerator->generate('67010111', '1998'));
        $this->assertIban('DE62250101111026500907', self::$deIBANGenerator->generate('25010111', '2007'));
        $this->assertIban('DE45370101111635100100', self::$deIBANGenerator->generate('37010111', '4004'));
        $this->assertIban('DE88670101111304610900', self::$deIBANGenerator->generate('67010111', '4444'));
        $this->assertIban('DE20250101111395676000', self::$deIBANGenerator->generate('25010111', '5000'));
        $this->assertIban('DE96290101111611754300', self::$deIBANGenerator->generate('29010111', '5510'));
        $this->assertIban('DE43500101111000400200', self::$deIBANGenerator->generate('50010111', '6060'));
        $this->assertIban('DE02670101111296401301', self::$deIBANGenerator->generate('67010111', '6800'));
        $this->assertIban('DE13380101111027758200', self::$deIBANGenerator->generate('38010111', '55555'));
        $this->assertIban('DE98500101111005007001', self::$deIBANGenerator->generate('50010111', '60000'));
        $this->assertIban('DE49200101111798758900', self::$deIBANGenerator->generate('20010111', '666666'));
        $this->assertIban('DE59370101111837501600', self::$deIBANGenerator->generate('37010111', '102030'));
        $this->assertIban('DE48700101111249461502', self::$deIBANGenerator->generate('70010111', '121212'));
        $this->assertIban('DE78300101111413482100', self::$deIBANGenerator->generate('30010111', '130500'));
        $this->assertIban('DE24370101111213431002', self::$deIBANGenerator->generate('37010111', '202020'));
        $this->assertIban('DE59380101111010555101', self::$deIBANGenerator->generate('38010111', '414141'));
        $this->assertIban('DE49200101111798758900', self::$deIBANGenerator->generate('20010111', '666666'));
        $this->assertIban('DE62370101111403124100', self::$deIBANGenerator->generate('37010111','5000000'));
        $this->assertIban('DE17600101111045720000', self::$deIBANGenerator->generate('60010111','500500500'));
    }

    private function assertIban($ibanExpected, $ibanActual)
    {
        $this->assertEquals($ibanExpected, trim($ibanActual));
    }
}
