<?php

namespace IBAN\Rule\DE;

class Rule001400 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
        $this->instituteIdentification = '30060601';
        return parent::generateIban();
    }
}
