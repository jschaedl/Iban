<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000400 extends \IBAN\Rule\DE\IBANRuleDE000000
{     
    public function generateIban() {
    	if (strcmp($this->bankAccountNumber, '135') == 0) {
            $this->bankAccountNumber = '0990021440';
        } else if (strcmp($this->bankAccountNumber, '1111') == 0) {
            $this->bankAccountNumber = '6600012020';
        } else if (strcmp($this->bankAccountNumber, '1900') == 0) {
            $this->bankAccountNumber = '0920019005';
        } else if (strcmp($this->bankAccountNumber, '7878') == 0) {
            $this->bankAccountNumber = '0780008006';
        } else if (strcmp($this->bankAccountNumber, '8888') == 0) {
            $this->bankAccountNumber = '0250030942';
        } else if (strcmp($this->bankAccountNumber, '9595') == 0) {
            $this->bankAccountNumber = '1653524703';
        } else if (strcmp($this->bankAccountNumber, '97097') == 0) {
            $this->bankAccountNumber = '0013044150';
        } else if (strcmp($this->bankAccountNumber, '112233') == 0) {
            $this->bankAccountNumber = '0630025819';
        } else if (strcmp($this->bankAccountNumber, '336666') == 0) {
            $this->bankAccountNumber = '6604058903';
        } else if (strcmp($this->bankAccountNumber, '484848') == 0) {
            $this->bankAccountNumber = '0920018963';
        }
        return parent::generateIban();
    }
}
