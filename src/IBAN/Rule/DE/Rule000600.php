<?php

namespace IBAN\Rule\DE;

class Rule000600 extends \IBAN\Rule\DE\Rule000000
{     
    public function generateIban() {
    	if ($this->bankAccountNumberEquals('1111111')) {
            $this->bankAccountNumber = '20228888';
        } else if ($this->bankAccountNumberEquals('7777777')) {
            $this->bankAccountNumber = '903286003';
        } else if ($this->bankAccountNumberEquals('34343434')) {
            $this->bankAccountNumber = '1000506517';
        } else if ($this->bankAccountNumberEquals('70000')) {
            $this->bankAccountNumber = '18180018';
        }
        return parent::generateIban();
    }
}
