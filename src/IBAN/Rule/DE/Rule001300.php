<?php

namespace IBAN\Rule\DE;

class Rule001300 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
        $this->instituteIdentification = '30050000';
        return parent::generateIban();
    }
}
