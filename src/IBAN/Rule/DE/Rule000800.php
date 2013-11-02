<?php

namespace IBAN\Rule\DE;

class Rule000800 extends \IBAN\Rule\DE\Rule000000
{    
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
		parent::__construct($localeCode, '50020200', $bankAccountNumber);
	}
}
