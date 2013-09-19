<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000100 extends \IBAN\Rule\IBANRuleDE
{
    const IBAN_RULE_CODE = '0002';
    const IBAN_RULE_VERSION = '00';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function generateIban($localeCode, $instituteIdentification, $bankAccountNumber) {
        if (preg_match('/' . '[0-9A-Z]{7}86[0-9A-Z]{1}' . '/', $bankAccountNumber) === 1 || 
            preg_match('/' . '[0-9A-Z]{6}6[0-9A-Z]{2}' . '/', $bankAccountNumber) === 1) {
            return '';
        } else { 
            return parent::generateIban($localeCode, $instituteIdentification, $bankAccountNumber);
        }
    }
}
