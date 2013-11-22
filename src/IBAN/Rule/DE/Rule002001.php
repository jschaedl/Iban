<?php

namespace IBAN\Rule\DE;

class Rule002001 extends \IBAN\Rule\DE\Rule000000
{    
    protected $bankAccountSubstitutions = array(

    );

    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
        $bankAccountReplacement = array(
            "50070010#9999" => "92777202",
        );
        if(isset($instituteIdentificationReplacement[$instituteIdentification."#".$bankAccountNumber])) {
            $bankAccountNumber = $instituteIdentificationReplacement[$instituteIdentification."#".$bankAccountNumber];
        }
		
		if(substr($instituteIdentification, 3, 1) == "7") {
			if(strlen($bankAccountNumber) == 7) {
				$bankAccountNumber .= "00";
			}
		}

        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);

    }
    public function generateIban() {
       return parent::generateIban();
    }
}
