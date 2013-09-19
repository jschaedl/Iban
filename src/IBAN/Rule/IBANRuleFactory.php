<?php

namespace IBAN\Rule;

class IBANRuleFactory
{
	public function createIBANRule($localeCode, $instituteIdentification) {
	    $ibanRuleCodeAndVersion = $this->getIbanRuleCodeAndVersion($instituteIdentification);
	    $ibanRuleClassName = '\\IBAN\\Rule\\' . $localeCode . '\\IBANRule' . $localeCode . $ibanRuleCodeAndVersion;
	    return new $ibanRuleClassName($localeCode, $instituteIdentification);
	}
	
	private function getIbanRuleCodeAndVersion($instituteIdentification) {
	    // TODO: check bankleitzahlen file and get the ibanRuleCodeAndVersion from position 13
	    return '';
	}
}