<?php

class IBANRuleFactoryTest extends PHPUnit_Framework_TestCase
{
	protected function setUp() {
	}
	
	protected function tearDown() {
	}
	
	public function testCreateIBANRule_DE() {
	    $ibanFactory = new \IBAN\Rule\IBANRuleFactory();
	    $ibanRule = $ibanFactory->createIBANRule('DE', '50010517');
	    $this->assertInstanceOf('\IBAN\Rule\DE\IBANRuleDE', $ibanRule);
	}
	
	public function testCreateIBANRule_DE000200() {
	    $ibanFactory = new \IBAN\Rule\IBANRuleFactory();
	    $ibanRule = $ibanFactory->createIBANRule('DE', '72020700');
	    $this->assertInstanceOf('\IBAN\Rule\DE\IBANRuleDE000200', $ibanRule);
	}
	
	public function testCreateIBANRule_DE000300() {
	    $ibanFactory = new \IBAN\Rule\IBANRuleFactory();
	    $ibanRule = $ibanFactory->createIBANRule('DE', '51010400');
	    $this->assertInstanceOf('\IBAN\Rule\DE\IBANRuleDE000300', $ibanRule);
	}
	
	public function testGetIbanRuleCodeAndVersion_000200() {	    
	    $method = new ReflectionMethod('\IBAN\Rule\IBANRuleFactory', 'getIbanRuleCodeAndVersion');
	    $method->setAccessible(TRUE);
	    $this->assertEquals('000200', $method->invoke(new \IBAN\Rule\IBANRuleFactory(), '72020700'));
	}
	
	public function testGetIbanRuleCodeAndVersion_000300() {
	    $method = new ReflectionMethod('\IBAN\Rule\IBANRuleFactory', 'getIbanRuleCodeAndVersion');
	    $method->setAccessible(TRUE);
	    $this->assertEquals('000300', $method->invoke(new \IBAN\Rule\IBANRuleFactory(), '51010400'));
	}
}