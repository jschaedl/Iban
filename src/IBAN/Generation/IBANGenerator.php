<?php

namespace IBAN\Generation;

use IBAN\Rule\IBANRuleFactory;

class IBANGenerator
{
    private $ibanRuleFactory;

    private $instituteIdentification;
    private $bankAccountNumber;
    
    public function __construct($ibanRuleFactory) {
        $this->ibanRuleFactory = $ibanRuleFactory;
    }
    
    public static function DE($instituteIdentification, $bankAccountNumber) {
        $ruleFactory = new IBANRuleFactory('DE');
        $generater = new IBANGenerator($ruleFactory);
        return $generater->generate($instituteIdentification, $bankAccountNumber);
    }
    
    private function generate($instituteIdentification, $bankAccountNumber) {
        $this->instituteIdentification = $instituteIdentification;
        $this->bankAccountNumber = $bankAccountNumber;
        
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
