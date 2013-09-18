<?php

class IBANValidatorTest extends PHPUnit_Framework_TestCase 
{
	protected $ibanValidator;
	protected $validIbans;
	protected $invalidIbans;

	protected function setUp() {
		$this->ibanValidator = new \IBAN\IBANValidator();
		$this->validIbans = array(
			AT611904300234573201
	        , BA391290079401028494
	        , BE68539007547034
	        , BE43068999999501
	        , BG80BNBG96611020345678
	        , CH9300762011623852957
	        , CY17002001280000001200527600
	        , CZ6508000000192000145399
	        , DE89370400440532013000
	        , DK5000400440116243
	        , EE382200221020145685
	        , ES9121000418450200051332
	        , FR1420041010050500013M02606
	        , FI2112345600000785
	        , GB29NWBK60161331926819
	        , GI75NWBK000000007099453
	        , GR1601101250000000012300695
	        , HR1210010051863000160
	        , HU42117730161111101800000000
	        , IE29AIBK93115212345678
	        , IL620108000000099999999
	        , IS140159260076545510730339
	        , IT60X0542811101000000123456
	        , LI21088100002324013AA
	        , LT121000011101001000
	        , LU280019400644750000
	        , LV80BANK0000435195001
	        , MC1112739000700011111000H79
	        , ME25505000012345678951
	        , MK07250120000058984
	        , MT84MALT011000012345MTLCAST001S
	        , MU17BOMM0101101030300200000MUR
	        , NL91ABNA0417164300
	        , NO9386011117947
	        , PL61109010140000071219812874
	        , PT50000201231234567890154
	        , RO49AAAA1B31007593840000
	        , RS35260005601001611379
	        , SE9412312345678901234561
	        , SI56191000000123438
	        , SK3112000000198742637541
	        , SM86U0322509800000000270100
	        , TN5914207207100707129648 
			, TR330006100519786457841326
		);
		$this->invalidIbans = array(
			AD1200012030200359100120
			, AT611904300234573221
			, BA39129007940028494
			, BE685390047034
		);
	}

	protected function tearDown() {
		$this->ibanValidator = null;
	}

	public function testValidate_IfIbanIsValid() {
        foreach ($this->validIbans as $validIban) {
        	$this->assertEqualsIsValid($validIban);
        }
	}
	
	public function testValidate_IfIbanIsInvalid()	{
	foreach ($this->invalidIbans as $invalidIban) {
        	$this->assertEqualsIsInvalid($invalidIban);
        }
	}
	
	private function assertEqualsIsValid($iban) {
		$this->assertEquals( $this->ibanValidator->validate($iban), true );
	}
	
	private function assertEqualsIsInvalid($iban) {
		$this->assertEquals( $this->ibanValidator->validate($iban), false );
	}
}
