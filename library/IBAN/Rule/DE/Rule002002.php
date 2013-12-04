<?php
/**
 * Iban
 *
 * @author      Stefan Warnat
 * @link        https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Rule\DE;

class Rule002002 extends \IBAN\Rule\DE\Rule000000 
{
	public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
		$bankAccountReplacement = array (
			"50070010#9999" => "92777202" 
		);
		
		if (isset($instituteIdentificationReplacement[$instituteIdentification . "#" . $bankAccountNumber])) {
			$bankAccountNumber = $instituteIdentificationReplacement[$instituteIdentification . "#" . $bankAccountNumber];
		}
		
		if (substr($instituteIdentification, 3, 1) == '7') {
			if (strlen( $bankAccountNumber) == 7) {
				$bankAccountNumber = str_pad($bankAccountNumber, 9, '0', STR_PAD_RIGHT);
			}
		}
		
		parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
	}
}
