<?php

namespace IBAN\Rule\DE;

class Rule001400 extends \IBAN\Rule\DE\Rule000000
{    
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
		parent::__construct($localeCode, '30060601', $bankAccountNumber);
	}
}
