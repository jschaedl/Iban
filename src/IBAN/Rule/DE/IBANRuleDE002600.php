<?php

namespace IBAN\Rule\DE;

class IBANRuleDE002600 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
		if ($this->bankAccountNumberEquals('55111') || 
			$this->bankAccountNumberEquals('8090100')) {
			// TODO skip bankAccountNumber validation (is not implemented yet)
		}
        return parent::generateIban();
    }
}
