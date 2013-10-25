<?php

namespace IBAN\Rule\DE;

class IBANRuleDE001500 extends \IBAN\Rule\DE\IBANRuleDE000000
{    
	public function generateIban() {
        $this->instituteIdentification = '37060193';
        if (strcmp($this->bankAccountNumber, '556') == 0) {
            $this->bankAccountNumber = '0000101010';
        } else if (strcmp($this->bankAccountNumber, '888') == 0) {
            $this->bankAccountNumber = '0031870011';
        } else if (strcmp($this->bankAccountNumber, '4040') == 0) {
            $this->bankAccountNumber = '4003600101';
        } else if (strcmp($this->bankAccountNumber, '5826') == 0) {
            $this->bankAccountNumber = '1015826017';
        } else if (strcmp($this->bankAccountNumber, '25000') == 0) {
            $this->bankAccountNumber = '0025000110';
        } else if (strcmp($this->bankAccountNumber, '393393') == 0) {
            $this->bankAccountNumber = '0033013019';
        } else if (strcmp($this->bankAccountNumber, '444555') == 0) {
            $this->bankAccountNumber = '0032230016';
        } else if (strcmp($this->bankAccountNumber, '603060') == 0) {
            $this->bankAccountNumber = '6002919018';
        } else if (strcmp($this->bankAccountNumber, '2120041') == 0) {
            $this->bankAccountNumber = '0002130041';
        } else if (strcmp($this->bankAccountNumber, '80868086') == 0) {
            $this->bankAccountNumber = '4007375013';
        } else if (strcmp($this->bankAccountNumber, '400569017') == 0) {
            $this->bankAccountNumber = '4000569017';
        }
        return parent::generateIban();
    }
}
