<?php

namespace IBAN\Rule\DE;

class Rule001200 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
        $this->instituteIdentification = '50050000';
        return parent::generateIban();
    }
}
