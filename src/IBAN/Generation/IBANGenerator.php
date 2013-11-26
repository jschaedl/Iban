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
        $ruleFactory = \IBAN\Rule\RuleFactory::DE();
        $generator = new IBANGenerator($ruleFactory, $instituteIdentification, $bankAccountNumber);
        return $generator->generate();
    }
 
    public function __construct($ibanRuleFactory, $instituteIdentification, $bankAccountNumber) {
    	$this->ibanRuleFactory = $ibanRuleFactory;
    	$this->instituteIdentification = $this->normalize($instituteIdentification);
    	$this->bankAccountNumber = $this->normalize($bankAccountNumber);
    }
    
    public function generate() {
        if ($this->areArgumentsValid()) {
            $ibanRule = $this->ibanRuleFactory->createIbanRule($this->instituteIdentification, $this->bankAccountNumber);
            return $ibanRule->generateIban();
        }
    }
    
    private function normalize($value) {
    	$value = trim($value);
    	$value = ltrim($value, '0');
    	$value = preg_replace('/\s+/', '', $value);
    	return $value;
    }
    
    private function areArgumentsValid() {
    	if (empty($this->instituteIdentification)) {
    		throw new \InvalidArgumentException('instituteIdentification is missing');
    	} else if (empty($this->bankAccountNumber)) {
    		throw new \InvalidArgumentException('bankAccountNumber is missing');
    	}
    	return true;
    }
}
