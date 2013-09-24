<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000100 extends \IBAN\Rule\DE\IBANRuleDE000000
{
	public function __construct($localeCode, $instituteIdentification) {
        parent::__construct($localeCode, $instituteIdentification);
    }
    
    public function generateIban($bankAccountNumber) {
        return '';
    }
}
