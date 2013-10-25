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
		if ($this->ibanRuleFileExists($ibanRuleCodeAndVersion)) {
	        return $this->createRule($ibanRuleCodeAndVersion, $instituteIdentification, $bankAccountNumber);
	    } else {
	        throw new \IBAN\Rule\Exception\RuleNotYetImplementedException('IBANRule' . $this->localeCode . $ibanRuleCodeAndVersion);
	    }
	}
	
	private function ibanRuleFileExists($ibanRuleCodeAndVersion) {
	   $ibanRuleFilename = $this->getIbanRuleFilename($ibanRuleCodeAndVersion);
	   return file_exists(__DIR__ . DIRECTORY_SEPARATOR . $ibanRuleFilename);
	}
	
	private function createRule($ibanRuleCodeAndVersion, $instituteIdentification, $bankAccountNumber) {
	    $ibanRuleQualifiedClassName = $this->getIbanRuleQualifiedClassName($ibanRuleCodeAndVersion);
	    return new $ibanRuleQualifiedClassName($this->localeCode, $instituteIdentification, $bankAccountNumber);
	}
	
	private function getIbanRuleQualifiedClassName($ibanRuleCodeAndVersion) {
	    return '\\IBAN\\Rule\\' . $this->localeCode . '\\IBANRule' . $this->localeCode . $ibanRuleCodeAndVersion;
	}
	
	private function getIbanRuleFilename($ibanRuleCodeAndVersion) {
	    return $this->localeCode . DIRECTORY_SEPARATOR . 'IBANRule' . $this->localeCode . $ibanRuleCodeAndVersion . '.php';
	}
	
	private function getIbanRuleCodeAndVersion($instituteIdentification) {
		if (!array_key_exists($instituteIdentification, self::$rules)) {
			throw new \IBAN\Rule\Exception\UnknownRuleException($instituteIdentification);
		} else {
			return self::$rules[$instituteIdentification];
		}
	}
}
