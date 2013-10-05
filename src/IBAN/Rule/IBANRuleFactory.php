<?php

namespace IBAN\Rule;

class IBANRuleFactory
{
    public static $rules;
    
    public function __construct() {
    	if(!isset(self::$rules)) {
    		self::$rules = require __DIR__.'/rules.php';
    	}
    }
    
	public function createIBANRule($localeCode, $instituteIdentification, $bankAccountNumber) {
		$ibanRuleCodeAndVersion = $this->getIbanRuleCodeAndVersion($instituteIdentification);
		$ibanRuleClassName = '\\IBAN\\Rule\\' . $localeCode . '\\IBANRule' . $localeCode . $ibanRuleCodeAndVersion;
	    if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . $localeCode . DIRECTORY_SEPARATOR . 'IBANRule' . $localeCode . $ibanRuleCodeAndVersion . '.php')) {
	    	throw new \IBAN\Rule\Exception\RuleNotYetImplementedException('IBANRule' . $localeCode . $ibanRuleCodeAndVersion);
	    } else {
	    	return new $ibanRuleClassName($localeCode, $instituteIdentification, $bankAccountNumber);
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
