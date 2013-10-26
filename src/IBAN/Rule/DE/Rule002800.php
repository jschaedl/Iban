<?php

namespace IBAN\Rule\DE;

class Rule002800 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
		if ($this->instituteIdentificationEquals('25050299')) { 
			$this->instituteIdentification = '25050180';
		}
        return parent::generateIban();
    }
}
