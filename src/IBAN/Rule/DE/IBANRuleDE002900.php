<?php

namespace IBAN\Rule\DE;

class IBANRuleDE002900 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
		if (substr($this->bankAccountNumber, 3, 1) == '0') {
			$this->bankAccountNumber = substr($this->bankAccountNumber, 0, 3) 
				. substr($this->bankAccountNumber, 4);
		}
        return parent::generateIban();
    }
}
