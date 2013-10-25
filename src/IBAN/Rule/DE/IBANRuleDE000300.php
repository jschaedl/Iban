<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000300 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
    public function generateIban() {
    	if ($this->bankAccountNumberEquals('6161604670')) {
            return '';
        } else {
            return parent::generateIban();
        }
    }
}
