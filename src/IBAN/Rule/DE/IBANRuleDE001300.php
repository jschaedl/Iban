<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001300 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        $this->instituteIdentification = '30050000';
        return parent::generateIban();
    }
}
