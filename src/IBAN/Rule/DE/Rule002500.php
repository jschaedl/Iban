<?php

namespace IBAN\Rule\DE;

class Rule002500 extends \IBAN\Rule\DE\Rule000000
{    
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
		parent::__construct($localeCode, '60050101', $bankAccountNumber);
	}
}
