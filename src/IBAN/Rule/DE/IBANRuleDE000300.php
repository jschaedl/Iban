<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000300 extends \IBAN\Rule\DE\IBANRuleDE
{
    const IBAN_RULE_CODE = '0003';
    const IBAN_RULE_VERSION = '00';
    
	public function __construct($localeCode, $instituteIdentification) {
        parent::__construct($localeCode, $instituteIdentification);
    }
    
    public function generateIban($bankAccountNumber) {
    	if (strcmp($bankAccountNumber, '6161604670') == 0) {
            return '';
        } else {
            return parent::generateIban($bankAccountNumber);
        }
    }
}
