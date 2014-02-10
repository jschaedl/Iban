<?php
namespace Bav;

use Bav\Encoder\EncoderFactory;

class BavTest extends \PHPUnit_Framework_TestCase
{
	protected $bav;

	protected function setUp() {
		$this->bav = Bav::DE();
	}

	protected function tearDown() {
		$this->bav = null;
	}

	/**
	 * @expectedException \Bav\Exception\BankDataResolverNotAvailableException
	 */
	public function testGetBankDataResolverForUnknownCountryThrowsException() {
		$this->bav->getBankDataResolver('GB');
	}

	public function testBankIsValid() {
		$bank = $this->bav->getBank('20090500');
		$this->assertTrue($bank->isValid('1359100'));
	}

	public function testMainAgency() {
		$bank = $this->bav->getBank('20090500');
		$agency = $bank->getMainAgency();
		$this->assertEquals('netbank', $agency->getName());
		$this->assertEquals('000000', $agency->getIbanRule());
	}

	public function testGetIbanRule() {
		$bank = $this->bav->getBank('45240056');
		$agency = $bank->getMainAgency();
		$this->assertEquals('000502', $agency->getIbanRule());
	}
	
	public function testSuccessorBankId() {
		$bank = $this->bav->getBank('58561250');
		$this->assertEquals('58564788', $bank->getBankId());
		
		$bank = $this->bav->getBank('58561250');
		$this->assertFalse(strcmp('58561250', $bank->getBankId()) === 0);
		
		$bank = $this->bav->getBank('68351976');
		$this->assertEquals('68351557', $bank->getBankId());
	}

	public function testBankExists() {
		$this->assertTrue($this->bav->bankExists('79550000'));
		$this->assertFalse($this->bav->bankExists('79550003'));
	}
}
