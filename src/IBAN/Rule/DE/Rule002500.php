<?php

namespace IBAN\Rule\DE;

class Rule002500 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
		$this->instituteIdentification = '60050101';
        return parent::generateIban();
    }
}
