<?php

namespace IBAN;

class IBANValidator 
{	
	function __construct() {
	}

	public function validate($iban) {
		$iban = new IBAN($iban);
		return $iban->isValid();
	}
}
