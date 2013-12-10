<?php
namespace IBAN\Rule;

use IBAN\Rule\RuleFactory;

class RuleFactoryTest extends \PHPUnit_Framework_TestCase
{
 	public function testCreateDE()
    {
        $this->assertInstanceOf('IBAN\Rule\RuleFactory', RuleFactory::DE());
    }
}
