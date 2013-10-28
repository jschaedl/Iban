<?php
/**
 * Iban
 *
 * @author      Jan Schaedlich <schaedlich.jan@gmail.com>
 * @copyright   2013 Jan Schaedlich
 * @link        https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Generation;

class IBANGenerator
{
	private $ruleFactory;
	private $instituteIdentification;
	private $bankAccountNumber;
	
	public static function DE($instituteIdentification, $bankAccountNumber) {
        $ruleFactory = new \IBAN\Rule\RuleFactory('DE');
        $generater = new IBANGenerator($ruleFactory, $instituteIdentification, $bankAccountNumber);
        return $generater->generate();
    }
 
    private function __construct($ibanRuleFactory, $instituteIdentification, $bankAccountNumber) {
    	$this->ibanRuleFactory = $ibanRuleFactory;
    	$this->instituteIdentification = ltrim($instituteIdentification, '0');
    	$this->bankAccountNumber = ltrim($bankAccountNumber, '0');
    }
    
    private function generate() {
        if ($this->areArgumentsValid()) {
            $ibanRule = $this->createRule();
            return $ibanRule->generateIban();
        }
    }
    
    private function createRule() {
    	return $this->ibanRuleFactory->createIBANRule(
	        $this->instituteIdentification, 
	        $this->bankAccountNumber);
    }
    
    private function areArgumentsValid() {
    	if (empty($this->instituteIdentification)) {
    		throw new \InvalidArgumentException('instituteIdentification is missing');
    	} else if (empty($this->bankAccountNumber)) {
    		throw new \InvalidArgumentException('bankAccountNumber is missing');
    	} else {
    		return true;
    	}
    	return false;
    }
}
