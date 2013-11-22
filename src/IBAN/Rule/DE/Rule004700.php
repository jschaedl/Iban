<?php

namespace IBAN\Rule\DE;

class Rule004700 extends \IBAN\Rule\DE\Rule000000
{    
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
		if(strlen($bankAccountNumber) == 8) {
			$bankAccountNumber = str_pad($bankAccountNumber, 10, "0", STR_PAD_RIGHT);
		}
		
        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }

}
