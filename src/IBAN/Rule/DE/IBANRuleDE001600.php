<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001600 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        if ($this->bankAccountNumberEquals('300000')) {
            $this->bankAccountNumber = '18128012';
        } 
        return parent::generateIban();
    }
}
