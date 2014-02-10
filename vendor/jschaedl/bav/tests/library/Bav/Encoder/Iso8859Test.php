<?php
namespace Bav\Encoder;

class Iso8859Test extends \PHPUnit_Framework_TestCase
{
	protected $object;

	protected function setUp() {
		$this->object = new Iso8859();
	}

	protected function tearDown() {}

	public function testIsSupportedForIso8859From1to15ReturnsTrue() {
		for ($i = 1; $i < 16; $i++) {
			$this->assertTrue(Iso8859::isSupported('ISO-8859-' . $i));
		}
	}

	public function testIsSupportedForNonIso8859ReturnsFalse() {
		$this->assertFalse(Iso8859::isSupported('ISO-8859-16'));
		$this->assertFalse(Iso8859::isSupported('ISO-8859-23'));
		$this->assertFalse(Iso8859::isSupported('UTF-8'));
		$this->assertFalse(Iso8859::isSupported('UTF-16'));
	}
}
