<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001900 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        if ($this->instituteIdentificationEquals('50130100') || 
            $this->instituteIdentificationEquals('50220200') || 
            $this->instituteIdentificationEquals('70030800')) {
            $this->instituteIdentification = '50120383';
        }
        return parent::generateIban();
    }
}
