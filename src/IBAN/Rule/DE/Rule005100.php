<?php

namespace IBAN\Rule\DE;

class Rule005100 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
		if ($this->bankAccountNumberEquals('333')) {
			$this->bankAccountNumber = '7832500881';
		} else if ($this->bankAccountNumberEquals('502')) {
			$this->bankAccountNumber = '1108884';
		} else if ($this->bankAccountNumberEquals('500500500')) {
			$this->bankAccountNumber = '5005000';
		} else if ($this->bankAccountNumberEquals('502502502')) {
			$this->bankAccountNumber = '1108884';
		}
        return parent::generateIban();
    }
}
