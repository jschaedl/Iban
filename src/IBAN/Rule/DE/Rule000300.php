<?php

namespace IBAN\Rule\DE;

class Rule000300 extends \IBAN\Rule\DE\Rule000000
{    
    public function generateIban() {
    	if ($this->bankAccountNumberEquals('6161604670')) {
            return '';
        } else {
            return parent::generateIban();
        }
    }
}
