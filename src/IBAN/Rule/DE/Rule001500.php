<?php

namespace IBAN\Rule\DE;

class Rule001500 extends \IBAN\Rule\DE\Rule000000
{    
    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
		parent::__construct($localeCode, '37060193', $bankAccountNumber);
	}
    
    protected $bankAccountSubstitutions = array(
            "556" =>    "0000101010"
            , "888" => "0031870011"
            , "4040" => "4003600101"
            , "5826" => "1015826017"
            , "25000" => "0025000110"
            , "393393" => "0033013019"
            , "444555" => "0032230016"
            , "603060" => "6002919018"
            , "2120041" => "0002130041"
            , "80868086" => "4007375013"
            , "400569017" => "4000569017"
    );
}
