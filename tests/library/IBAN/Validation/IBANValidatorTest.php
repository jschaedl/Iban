<?php

namespace IBAN\Validation;

use IBAN\Validation\IBANValidator;

class IBANValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $ibanValidator;
    protected $ibans;

    protected function setUp()
    {
        $this->ibanValidator = new IBANValidator();
        }

    protected function tearDown()
    {
        $this->ibanValidator = null;
    }

    /**
	 * @dataProvider validIbanDataProvider
	 */
	public function testValidIbans($iban)
    {
        $this->assertTrue($this->ibanValidator->validate($iban));
    }
    
    /**
     * @dataProvider invalidIbanDataProvider
     */
    public function testInvalidIbans($iban)
    {
        $this->assertFalse($this->ibanValidator->validate($iban));
    }
    
    public function validIbanDataProvider() 
    {
        return new CsvFileIterator('./tests/data/validibans.csv');
    }
    
    public function invalidIbanDataProvider() 
    {
        return new CsvFileIterator('./tests/data/invalidibans.csv');
    }
    
}
