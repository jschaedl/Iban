<?php

namespace IBAN\Rule\DE;

class IBANRuleDE002200 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
		if ($this->bankAccountNumberEquals('1111111')) {
			$this->bankAccountNumber = '2222200000';
		}
        return parent::generateIban();
    }
}
