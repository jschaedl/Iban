<?php

namespace IBAN;

class IBANGenerator 
{	
	function __construct() {
	}

	public function validate($iban) {
		$iban = new IBAN($iban);
		return $iban->isValid();
	}
}
