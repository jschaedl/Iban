<?php

namespace IBAN\Rule;

class IBANRuleFactory
{
    public static $rules;
    
    private $localeCode;
    
    public function __construct($localeCode='DE') {
        $this->localeCode = $localeCode;
    	
    	if(!isset(self::$rules)) {
    		self::$rules = require __DIR__ . '/' . $localeCode . '/' . '/rules.php';
    	}
    }
    
	public function createIBANRule($localeCode, $instituteIdentification, $bankAccountNumber) {
		$ibanRuleCodeAndVersion = $this->getIbanRuleCodeAndVersion($instituteIdentification);
		$ibanRuleClassName = '\\IBAN\\Rule\\' . $this->localeCode . '\\IBANRule' . $this->localeCode . $ibanRuleCodeAndVersion;
	    if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . $this->localeCode . DIRECTORY_SEPARATOR . 'IBANRule' . $this->localeCode . $ibanRuleCodeAndVersion . '.php')) {
	    	throw new \IBAN\Rule\Exception\RuleNotYetImplementedException('IBANRule' . $this->localeCode . $ibanRuleCodeAndVersion);
	    } else {
	    	return new $ibanRuleClassName($this->localeCode, $instituteIdentification, $bankAccountNumber);
	    }
	}
	
	private function getIbanRuleCodeAndVersion($instituteIdentification) {
		if (!array_key_exists($instituteIdentification, self::$rules)) {
			throw new \IBAN\Rule\Exception\UnknownRuleException($instituteIdentification);
		} else {
			return self::$rules[$instituteIdentification];
		}
	}
}
