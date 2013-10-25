<?php

namespace IBAN\Rule\DE;

class IBANRuleDE002400 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
		if ($this->bankAccountNumberEquals('94')) {
			$this->bankAccountNumber = '1694';
		} else if ($this->bankAccountNumberEquals('248')) {
			$this->bankAccountNumber = '17248';
		} else if ($this->bankAccountNumberEquals('345')) {
			$this->bankAccountNumber = '17345';
		} else if ($this->bankAccountNumberEquals('400')) {
			$this->bankAccountNumber = '14400';
		}
        return parent::generateIban();
    }
}
