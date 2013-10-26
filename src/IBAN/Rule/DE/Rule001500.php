<?php

namespace IBAN\Rule\DE;

class Rule001500 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
        $this->instituteIdentification = '37060193';
        if ($this->bankAccountNumberEquals('556')) {
            $this->bankAccountNumber = '0000101010';
        } else if ($this->bankAccountNumberEquals('888')) {
            $this->bankAccountNumber = '0031870011';
        } else if ($this->bankAccountNumberEquals('4040')) {
            $this->bankAccountNumber = '4003600101';
        } else if ($this->bankAccountNumberEquals('5826')) {
            $this->bankAccountNumber = '1015826017';
        } else if ($this->bankAccountNumberEquals('25000')) {
            $this->bankAccountNumber = '0025000110';
        } else if ($this->bankAccountNumberEquals('393393')) {
            $this->bankAccountNumber = '0033013019';
        } else if ($this->bankAccountNumberEquals('444555')) {
            $this->bankAccountNumber = '0032230016';
        } else if ($this->bankAccountNumberEquals('603060')) {
            $this->bankAccountNumber = '6002919018';
        } else if ($this->bankAccountNumberEquals('2120041')) {
            $this->bankAccountNumber = '0002130041';
        } else if ($this->bankAccountNumberEquals('80868086')) {
            $this->bankAccountNumber = '4007375013';
        } else if ($this->bankAccountNumberEquals('400569017')) {
            $this->bankAccountNumber = '4000569017';
        }
        return parent::generateIban();
    }
}
