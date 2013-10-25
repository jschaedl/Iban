<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001300 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        if (strcmp($this->instituteIdentification, '40050000') == 0) {
            $this->instituteIdentification = '30050000';
        }
        return parent::generateIban();
    }
}
