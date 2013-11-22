<?php

namespace IBAN\Rule\DE;

class Rule003101 extends \IBAN\Rule\DE\Rule000000
{    
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
    public function generateIban() {
		if(strlen($this->bankAccountNumber) != "10") {
			return "";
		}
		
       return parent::generateIban();
    }

}
