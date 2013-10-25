<?php

namespace IBAN\Rule\DE;

class IBANRuleDE002500 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
		$this->instituteIdentification = '60050101';
        return parent::generateIban();
    }
}
