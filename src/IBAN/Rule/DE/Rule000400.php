<?php

namespace IBAN\Rule\DE;

class Rule000400 extends \IBAN\Rule\DE\Rule000000
{     
    public function generateIban() {
    	if ($this->bankAccountNumberEquals('135')) {
            $this->bankAccountNumber = '0990021440';
        } else if ($this->bankAccountNumberEquals('1111')) {
            $this->bankAccountNumber = '6600012020';
        } else if ($this->bankAccountNumberEquals('1900')) {
            $this->bankAccountNumber = '0920019005';
        } else if ($this->bankAccountNumberEquals('7878')) {
            $this->bankAccountNumber = '0780008006';
        } else if ($this->bankAccountNumberEquals('8888')) {
            $this->bankAccountNumber = '0250030942';
        } else if ($this->bankAccountNumberEquals('9595')) {
            $this->bankAccountNumber = '1653524703';
        } else if ($this->bankAccountNumberEquals('97097')) {
            $this->bankAccountNumber = '0013044150';
        } else if ($this->bankAccountNumberEquals('112233')) {
            $this->bankAccountNumber = '0630025819';
        } else if ($this->bankAccountNumberEquals('336666')) {
            $this->bankAccountNumber = '6604058903';
        } else if ($this->bankAccountNumberEquals('484848')) {
            $this->bankAccountNumber = '0920018963';
        }
        return parent::generateIban();
    }
}
