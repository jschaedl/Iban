<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001000 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
    
    public function generateIban() {
        if (strcmp($this->instituteIdentification, '50050201') == 0 && strcmp($this->bankAccountNumber, '2000') == 0) {
            return 'DE42500502010000222000';
        } else if (strcmp($this->instituteIdentification, '50050201') == 0 && strcmp($this->bankAccountNumber, '800000') == 0) {
            return 'DE89500502010000180802';
        } else {
            return parent::generateIban();
        }
    }
}
