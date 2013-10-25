<?php

namespace IBAN\Rule\DE;

class IBANRuleDE002700 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
		if ($this->bankAccountNumberEquals('3333') || 
			$this->bankAccountNumberEquals('4444')) {
			// TODO skip bankAccountNumber validation (is not implemented yet)
		}
        return parent::generateIban();
    }
}
