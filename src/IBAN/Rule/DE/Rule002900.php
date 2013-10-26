<?php

namespace IBAN\Rule\DE;

class Rule002900 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
		if (substr($this->bankAccountNumber, 3, 1) == '0') {
			$this->bankAccountNumber = substr($this->bankAccountNumber, 0, 3) 
				. substr($this->bankAccountNumber, 4);
		}
        return parent::generateIban();
    }
}
