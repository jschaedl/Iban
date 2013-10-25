<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001600 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        if (strcmp($this->bankAccountNumber, '300000') == 0) {
            $this->bankAccountNumber = '18128012';
        } 
        return parent::generateIban();
    }
}
