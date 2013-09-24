<?php

namespace IBAN\Generation;

class IBANGenerator
{
    private $ibanRuleFactory;
    
    public function __construct() {
        $this->ibanRuleFactory = new \IBAN\Rule\IBANRuleFactory();
    }
    
    public function generate($localeCode, $instituteIdentification, $bankAccountNumber) {
        $ibanRule = null;
        $iban = null;
        if ($this->areArgumentsValid($localeCode, $instituteIdentification, $bankAccountNumber)) {
            $ibanRule = $this->ibanRuleFactory->createIBANRule($localeCode, $instituteIdentification);
            $iban = $ibanRule->generateIban($bankAccountNumber);
        }
        return $iban;
    }
    
    private function areArgumentsValid($localeCode, $instituteIdentification, $bankAccountNumber) {
    	if (empty($localeCode)) {
    		throw new \InvalidArgumentException('localeCode is missing');
    	} else if (empty($instituteIdentification)) {
    		throw new \InvalidArgumentException('instituteIdentification is missing');
    	} else if (empty($bankAccountNumber)) {
    		throw new \InvalidArgumentException('bankAccountNumber is missing');
    	} else if (empty(\IBAN\Core\Constants::$ibanFormatMap[$localeCode])) {
    		throw new \InvalidArgumentException('localeCode not exists');
    	} else {
    		return true;
    	}
    	return false;
    }
}
