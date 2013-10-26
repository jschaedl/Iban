<?php

namespace IBAN\Rule\DE;

class Rule002100 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
		$this->instituteIdentification = '36020030';
        return parent::generateIban();
    }
}
