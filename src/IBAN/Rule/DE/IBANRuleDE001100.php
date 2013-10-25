<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001100 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        if (strcmp($this->bankAccountNumber, '1000') == 0) {
            $this->bankAccountNumber = '8010001';
        } else if (strcmp($this->bankAccountNumber, '47800') == 0) {
            $this->bankAccountNumber = '47803';
        } 
        return parent::generateIban();
    }
}
