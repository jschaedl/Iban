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
        if ($bankAccountNumber === '6161604670') {
            return '';
        } else {
            return parent::generateIban($localeCode, $instituteIdentification, $bankAccountNumber);
        }
    }
}
