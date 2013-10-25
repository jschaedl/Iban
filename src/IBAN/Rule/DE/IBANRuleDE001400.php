<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001400 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        $this->instituteIdentification = '30060601';
        return parent::generateIban();
    }
}
