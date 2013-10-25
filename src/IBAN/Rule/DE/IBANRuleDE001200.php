<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001200 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        $this->instituteIdentification = '50050000';
        return parent::generateIban();
    }
}
