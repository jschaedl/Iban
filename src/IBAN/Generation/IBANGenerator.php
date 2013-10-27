<?php

namespace IBAN\Generation;

use IBAN\Rule\IBANRuleFactory;

class IBANGenerator
{
    public static function DE($instituteIdentification, $bankAccountNumber) {
        $ruleFactory = new IBANRuleFactory('DE');
        $generater = new IBANGenerator($ruleFactory);
        return $generater->generate($instituteIdentification, $bankAccountNumber);
    }

    private $ibanRuleFactory;
    private $instituteIdentification;
    private $bankAccountNumber;
    
    private function __construct($ibanRuleFactory) {
    	$this->ibanRuleFactory = $ibanRuleFactory;
    }
    
    private function generate($instituteIdentification, $bankAccountNumber) {
        $this->instituteIdentification = ltrim($instituteIdentification, '0');
        $this->bankAccountNumber = ltrim($bankAccountNumber, '0');    
        if ($this->areArgumentsValid()) {
            $ibanRule = $this->createRule();
            $iban = $this->createIban($ibanRule);
        }
        return $iban;
    }
    
    private function createRule() {
    	return $this->ibanRuleFactory->createIBANRule(
	        $this->instituteIdentification, 
	        $this->bankAccountNumber);
    }
    
    private function createIban($ibanRule) {
        return $ibanRule->generateIban();
    }
    
    private function areArgumentsValid() {
    	if (empty($this->instituteIdentification)) {
    		throw new \InvalidArgumentException('instituteIdentification is missing');
    	} else if (empty($this->bankAccountNumber)) {
    		throw new \InvalidArgumentException('bankAccountNumber is missing');
    	} else {
    		return true;
    	}
    	return false;
    }
}
