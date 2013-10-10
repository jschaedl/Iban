<?php

namespace IBAN\Generation;

use IBAN\Rule\IBANRuleFactory;

class IBANGenerator
{
    private $ibanRuleFactory;
    
    private $localeCode;
    private $instituteIdentification;
    private $bankAccountNumber;
    
    public function __construct($ibanRuleFactoryClassName = '\IBAN\Rule\IBANRuleFactory') {
        $this->ibanRuleFactory = new $ibanRuleFactoryClassName();
    }
    
    public function generate($localeCode, $instituteIdentification, $bankAccountNumber) {
        $this->localeCode = $localeCode;
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
	        $this->localeCode, 
	        $this->instituteIdentification, 
	        $this->bankAccountNumber);
    }
    
    private function createIban($ibanRule) {
        return $ibanRule->generateIban();
    }
    
    private function areArgumentsValid() {
    	if (empty($this->localeCode)) {
    		throw new \InvalidArgumentException('localeCode is missing');
    	} else if (empty($this->instituteIdentification)) {
    		throw new \InvalidArgumentException('instituteIdentification is missing');
    	} else if (empty($this->bankAccountNumber)) {
    		throw new \InvalidArgumentException('bankAccountNumber is missing');
    	} else if (empty(\IBAN\Core\Constants::$ibanFormatMap[$this->localeCode])) {
    		throw new \InvalidArgumentException('localeCode not exists');
    	} else {
    		return true;
    	}
    	return false;
    }
}
