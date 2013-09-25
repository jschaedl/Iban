<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000100 extends \IBAN\Rule\DE\IBANRuleDE000000
{
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
    
    public function generateIban() {
        return '';
    }
}
