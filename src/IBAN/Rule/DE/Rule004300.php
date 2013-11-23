<?php

namespace IBAN\Rule\DE;

class Rule004300 extends \IBAN\Rule\DE\Rule000000
{    
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
		if($instituteIdentification == "60651070") {
			$instituteIdentification = "66650085";
		}
        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }

}
