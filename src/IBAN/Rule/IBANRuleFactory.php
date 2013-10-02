<?php

namespace IBAN\Rule;

class IBANRuleFactory
{
    //public $ibanRules;
    
    public function __construct() {
        /*
        realpath(dirname(__FILE__)) . 'blz_iban_rule.csv';
         
    	if (($handle = fopen("blz_iban_rule.csv", "r")) !== FALSE) {
            $data = array();
    	    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                for ($i=0; $i < count($data) - 1; $i++) {
                    $ibanRules[$data[$i]] = $data[$i + 1];
                }
            }
            fclose($handle);
    	}
    	*/
    }
    
	public function createIBANRule($localeCode, $instituteIdentification, $bankAccountNumber) {
		$ibanRuleCodeAndVersion = $this->getIbanRuleCodeAndVersion($instituteIdentification);
		$ibanRuleClassName = '\\IBAN\\Rule\\' . $localeCode . '\\IBANRule' . $localeCode . $ibanRuleCodeAndVersion;
	    return new $ibanRuleClassName($localeCode, $instituteIdentification, $bankAccountNumber);
	}
	
	// TODO: check bankleitzahlen file (Deutsche BundesBank ExtraNet) 
	// and get the ibanRuleCodeAndVersion from position 14 
	// for now code it hard
	private function getIbanRuleCodeAndVersion($instituteIdentification) {
	    if (trim($instituteIdentification) === '72020700') {
			return '000200';
		} else if (trim($instituteIdentification) === '51010400') {
			return '000300';
		} else if (trim($instituteIdentification) === '10050000') {
			return '000400';
		} else {
			return '000000';
		}
	}
}