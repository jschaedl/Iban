<?php

namespace IBAN\Rule\DE;

class Rule002300 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
		if ($this->bankAccountNumberEquals('700')) {
			$this->bankAccountNumber = '1000700800';
		}
        return parent::generateIban();
    }
}
