<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000200 extends \IBAN\Rule\DE\IBANRuleDE000000
{
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
    
    public function generateIban() {
    	if (preg_match('/' . '[0-9A-Z]{7}[8]{1}[6]{1}[0-9A-Z]{1}' . '/', $this->bankAccountNumber) === 1 || 
            preg_match('/' . '[0-9A-Z]{7}[6]{1}[0-9A-Z]{2}' . '/', $this->bankAccountNumber) === 1) {
    		return '';
        } else { 
            return parent::generateIban();
        }
    }
}
