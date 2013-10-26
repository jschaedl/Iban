<?php

namespace IBAN\Rule\DE;

class Rule002600 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
		if ($this->bankAccountNumberEquals('55111') || 
			$this->bankAccountNumberEquals('8090100')) {
			// TODO skip bankAccountNumber validation (is not implemented yet)
		}
        return parent::generateIban();
    }
}
