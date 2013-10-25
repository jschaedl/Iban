<?php

namespace IBAN\Rule\DE;

class IBANRuleDE002100 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
		$this->instituteIdentification = '36020030';
        return parent::generateIban();
    }
}
