<?php

namespace IBAN\Rule\DE;

class Rule001800 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
        if ($this->bankAccountNumberEquals('556')) {
            $this->bankAccountNumber = '120440110';
        } else if ($this->bankAccountNumberEquals('5435435430')) {
            $this->bankAccountNumber = '543543543';
        }  else if ($this->bankAccountNumberEquals('2157')) {
            $this->bankAccountNumber = '121787016';
        }  else if ($this->bankAccountNumberEquals('9800')) {
            $this->bankAccountNumber = '120800019';
        }  else if ($this->bankAccountNumberEquals('202050')) {
            $this->bankAccountNumber = '1221864014';
        } 
        return parent::generateIban();
    }
}
