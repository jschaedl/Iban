<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001000 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
    public function generateIban() {
        if ($this->instituteIdentificationEquals('50050201') && $this->bankAccountNumberEquals('2000')) {
            return 'DE42500502010000222000';
        } else if ($this->instituteIdentificationEquals('50050201') && $this->bankAccountNumberEquals('800000')) {
            return 'DE89500502010000180802';
        } else {
            return parent::generateIban();
        }
    }
}
