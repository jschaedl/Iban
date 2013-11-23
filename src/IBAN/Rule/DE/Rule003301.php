<?php

namespace IBAN\Rule\DE;

class Rule003301 extends \IBAN\Rule\DE\Rule000000
{    
	protected $bankAccountSubstitutions = array(
		"22222" => "5803435253"
		, "1111111" => "39908140"
		, "94" => "2711931"
		, "7777777" => "5800522694"
		, "55555" => "5801800000"
	);
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
		
		if(intval($this->bankAccountNumber) >= 800000000 && intval($this->bankAccountNumber) <= 899999999) {
			$instituteIdentification = "70020270";
		}	
	
        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
    public function generateIban() {

		
		return parent::generateIban();
    }

}
