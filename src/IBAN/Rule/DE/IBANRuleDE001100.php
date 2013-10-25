<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001100 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        if ($this->bankAccountNumberEquals('1000')) {
            $this->bankAccountNumber = '8010001';
        } else if ($this->bankAccountNumberEquals('47800')) {
            $this->bankAccountNumber = '47803';
        } 
        return parent::generateIban();
    }
}
