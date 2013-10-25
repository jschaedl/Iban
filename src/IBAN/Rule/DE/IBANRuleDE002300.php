<?php

namespace IBAN\Rule\DE;

class IBANRuleDE002300 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
		if ($this->bankAccountNumberEquals('700')) {
			$this->bankAccountNumber = '1000700800';
		}
        return parent::generateIban();
    }
}
