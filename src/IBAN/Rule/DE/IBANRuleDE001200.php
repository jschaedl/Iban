<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001200 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        if (strcmp($this->instituteIdentification, '50850049') == 0) {
            $this->instituteIdentification = '50050000';
        }
        return parent::generateIban();
    }
}
