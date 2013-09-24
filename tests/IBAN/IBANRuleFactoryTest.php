<?php

class IBANRuleFactoryTest extends PHPUnit_Framework_TestCase
{
	protected $ibanFactory;
	protected $privateMethodGetIbanRuleCodeAndVersion;
	
	protected function setUp() {
		$this->ibanFactory = new \IBAN\Rule\IBANRuleFactory();
		$this->privateMethodGetIbanRuleCodeAndVersion = new ReflectionMethod('\IBAN\Rule\IBANRuleFactory', 'getIbanRuleCodeAndVersion');
		$this->privateMethodGetIbanRuleCodeAndVersion->setAccessible(TRUE);
	}
	
	protected function tearDown() {
		$this->ibanFactory = null;
		$this->privateMethodGetIbanRuleCodeAndVersion = null;
	}
	
	// --
	
	public function testCreateIBANRule_DE000000() {
	    $ibanRule = $this->ibanFactory->createIBANRule('DE', '50010517');
	    $this->assertInstanceOf('\IBAN\Rule\DE\IBANRuleDE000000', $ibanRule);
	}
	
	public function testCreateIBANRule_DE000200() {
	    $ibanRule = $this->ibanFactory->createIBANRule('DE', '72020700');
	    $this->assertInstanceOf('\IBAN\Rule\DE\IBANRuleDE000200', $ibanRule);
	}
	
	public function testCreateIBANRule_DE000300() {
	    $ibanRule = $this->ibanFactory->createIBANRule('DE', '51010400');
	    $this->assertInstanceOf('\IBAN\Rule\DE\IBANRuleDE000300', $ibanRule);
	}
	
	// --
	
	public function testGetIbanRuleCodeAndVersion_000000() {
	    $this->assertEquals('000000', $this->privateMethodGetIbanRuleCodeAndVersion->invoke($this->ibanFactory, '50010517'));
	}
	
	public function testGetIbanRuleCodeAndVersion_000200() {	    
	    $this->assertEquals('000200', $this->privateMethodGetIbanRuleCodeAndVersion->invoke($this->ibanFactory, '72020700'));
	}
	
	public function testGetIbanRuleCodeAndVersion_000300() {
	    $this->assertEquals('000300', $this->privateMethodGetIbanRuleCodeAndVersion->invoke($this->ibanFactory, '51010400'));
	}
}