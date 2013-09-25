<?php

namespace IBAN\Rule;

class IBANRuleFactory
{
	public function createIBANRule($localeCode, $instituteIdentification, $bankAccountNumber) {
		$ibanRuleCodeAndVersion = $this->getIbanRuleCodeAndVersion($instituteIdentification);
		$ibanRuleClassName = '\\IBAN\\Rule\\' . $localeCode . '\\IBANRule' . $localeCode . $ibanRuleCodeAndVersion;
	    return new $ibanRuleClassName($localeCode, $instituteIdentification, $bankAccountNumber);
	}
	
	// TODO: check bankleitzahlen file (Deutsche BundesBank ExtraNet) 
	// and get the ibanRuleCodeAndVersion from position 14 
	// for now code it hard
	private function getIbanRuleCodeAndVersion($instituteIdentification) {
	    if (trim($instituteIdentification) === '72020700') {
			return '000200';
		} else if (trim($instituteIdentification) === '51010400') {
			return '000300';
		} else {
			return '000000';
		}
	}
}