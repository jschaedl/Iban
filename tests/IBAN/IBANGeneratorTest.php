<?php

class IBANGeneratorTest extends PHPUnit_Framework_TestCase 
{
	protected $ibanGenerator;

	protected function setUp() {
		$this->ibanGenerator = new \IBAN\IBANGenerator();
	}

	protected function tearDown() {
		$this->ibanGenerator = null;
	}

	public function testValidate_IfIbanIsValid()
	{
        // valid IBANs found on www.ecbs.org
        $this->assertEquals( $this->ibanGenerator->validate('AD1200012030200359100100'), true );
        $this->assertEquals( $this->ibanGenerator->validate('AT611904300234573201'), true );
        $this->assertEquals( $this->ibanGenerator->validate('BA391290079401028494'), true );
        $this->assertEquals( $this->ibanGenerator->validate('BE68539007547034'), true );
        $this->assertEquals( $this->ibanGenerator->validate('BE43068999999501'), true );
        $this->assertEquals( $this->ibanGenerator->validate('BG80BNBG96611020345678'), true );
        $this->assertEquals( $this->ibanGenerator->validate('CH9300762011623852957'), true );
        $this->assertEquals( $this->ibanGenerator->validate('CY17002001280000001200527600'), true );
        $this->assertEquals( $this->ibanGenerator->validate('CZ6508000000192000145399'), true );
        $this->assertEquals( $this->ibanGenerator->validate('DE89370400440532013000'), true );
        $this->assertEquals( $this->ibanGenerator->validate('DK5000400440116243'), true );
        $this->assertEquals( $this->ibanGenerator->validate('EE382200221020145685'), true );
        $this->assertEquals( $this->ibanGenerator->validate('ES9121000418450200051332'), true );
        $this->assertEquals( $this->ibanGenerator->validate('FR1420041010050500013M02606'), true );
        $this->assertEquals( $this->ibanGenerator->validate('FI2112345600000785'), true );
        $this->assertEquals( $this->ibanGenerator->validate('GB29NWBK60161331926819'), true );
        $this->assertEquals( $this->ibanGenerator->validate('GI75NWBK000000007099453'), true );
        $this->assertEquals( $this->ibanGenerator->validate('GR1601101250000000012300695'), true );
        $this->assertEquals( $this->ibanGenerator->validate('HR1210010051863000160'), true );
        $this->assertEquals( $this->ibanGenerator->validate('HU42117730161111101800000000'), true );
        $this->assertEquals( $this->ibanGenerator->validate('IE29AIBK93115212345678'), true );
        $this->assertEquals( $this->ibanGenerator->validate('IL620108000000099999999'), true );
        $this->assertEquals( $this->ibanGenerator->validate('IS140159260076545510730339'), true );
        $this->assertEquals( $this->ibanGenerator->validate('IT60X0542811101000000123456'), true );
        $this->assertEquals( $this->ibanGenerator->validate('LI21088100002324013AA'), true );
        $this->assertEquals( $this->ibanGenerator->validate('LT121000011101001000'), true );
        $this->assertEquals( $this->ibanGenerator->validate('LU280019400644750000'), true );
        $this->assertEquals( $this->ibanGenerator->validate('LV80BANK0000435195001'), true );
        $this->assertEquals( $this->ibanGenerator->validate('MC1112739000700011111000H79'), true );
        $this->assertEquals( $this->ibanGenerator->validate('ME25505000012345678951'), true );
        $this->assertEquals( $this->ibanGenerator->validate('MK07250120000058984'), true );
        $this->assertEquals( $this->ibanGenerator->validate('MT84MALT011000012345MTLCAST001S'), true );
        $this->assertEquals( $this->ibanGenerator->validate('MU17BOMM0101101030300200000MUR'), true );
        $this->assertEquals( $this->ibanGenerator->validate('NL91ABNA0417164300'), true );
        $this->assertEquals( $this->ibanGenerator->validate('NO9386011117947'), true );
        $this->assertEquals( $this->ibanGenerator->validate('PL61109010140000071219812874'), true );
        $this->assertEquals( $this->ibanGenerator->validate('PT50000201231234567890154'), true );
        $this->assertEquals( $this->ibanGenerator->validate('RO49AAAA1B31007593840000'), true );
        $this->assertEquals( $this->ibanGenerator->validate('RS35260005601001611379'), true );
        $this->assertEquals( $this->ibanGenerator->validate('SE9412312345678901234561'), true );
        $this->assertEquals( $this->ibanGenerator->validate('SI56191000000123438'), true );
        $this->assertEquals( $this->ibanGenerator->validate('SK3112000000198742637541'), true );
        $this->assertEquals( $this->ibanGenerator->validate('SM86U0322509800000000270100'), true );
        $this->assertEquals( $this->ibanGenerator->validate('TN5914207207100707129648'), true );
        $this->assertEquals( $this->ibanGenerator->validate('TR330006100519786457841326'), true );
	}
	
	public function testValidate_IfIbanIsInValid()
	{
		$this->assertEquals( $this->ibanGenerator->validate('AD1200012030200359100120'), false );
		$this->assertEquals( $this->ibanGenerator->validate('AT611904300234573221'), false );
		$this->assertEquals( $this->ibanGenerator->validate('BA39129007940028494'), false );
		$this->assertEquals( $this->ibanGenerator->validate('BE685390047034'), false );
	}
}
