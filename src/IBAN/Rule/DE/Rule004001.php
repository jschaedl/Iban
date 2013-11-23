<?php

namespace IBAN\Rule\DE;

class Rule004001 extends \IBAN\Rule\DE\Rule000000
{    
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
	    parent::__construct($localeCode, "68052328", $bankAccountNumber);
    }

}
