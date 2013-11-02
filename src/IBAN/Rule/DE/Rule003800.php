<?php

namespace IBAN\Rule\DE;

class Rule003800 extends \IBAN\Rule\DE\Rule000000
{    
	protected $instituteIdentificationSubstitutions = array(
		"26691213" => "28590075"
		, "28591579" => "28590075"
		, "25090300" => "28590075"
	);
}
