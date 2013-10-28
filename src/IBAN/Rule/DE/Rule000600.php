<?php

namespace IBAN\Rule\DE;

class Rule000600 extends \IBAN\Rule\DE\Rule000000
{     
	protected $bankAccountSubstitutions = array(
		"1111111" => "20228888"
		, "7777777" => "903286003"
		, "34343434" => "1000506517"
		, "70000" => "18180018"
	);
}
