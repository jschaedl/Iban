<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000100 extends \IBAN\Rule\DE\IBANRuleDE
{
    const IBAN_RULE_CODE = '0001';
    const IBAN_RULE_VERSION = '00';
    
	public function __construct($localeCode, $instituteIdentification) {
        parent::__construct($localeCode, $instituteIdentification);
    }
    
    public function generateIban($bankAccountNumber) {
        return '';
    }
}
