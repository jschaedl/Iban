<?php

namespace IBAN\Rule\DE;

class Rule004100 extends \IBAN\Rule\DE\Rule000000
{    

    public function generateIban() {
		if($this->instituteIdentification == "62220000") {
			return "DE96500604000000011404";
		}
       
	   return parent::generateIban();
    }
}
