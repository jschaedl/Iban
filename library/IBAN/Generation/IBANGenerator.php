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

use IBAN\Rule\RuleFactory;
use IBAN\Rule\RuleFactoryInterface;

class IBANGenerator
{
    private $ruleFactory;

    public static function DE($instituteIdentification, $bankAccountNumber) 
    {
        $generator = new IBANGenerator(RuleFactory::DE());
        return $generator->generate($instituteIdentification, $bankAccountNumber);
    }
    
    public function __construct(RuleFactoryInterface $ruleFactory)
    {
        $this->ruleFactory = $ruleFactory;
    }

    public function generate($instituteIdentification, $bankAccountNumber)
    {
        $instituteIdentification = $this->normalize($instituteIdentification);
        $bankAccountNumber = $this->normalize($bankAccountNumber);
        
        if (empty($instituteIdentification)) {
        	throw new \InvalidArgumentException('instituteIdentification is missing');
        } elseif (empty($bankAccountNumber)) {
        	throw new \InvalidArgumentException('bankAccountNumber is missing');
        }

        $ibanRule = $this->ruleFactory->createIbanRule($instituteIdentification, $bankAccountNumber);

        return $ibanRule->generateIban();
    }

    private function normalize($value)
    {
        $value = trim($value);
        $value = ltrim($value, '0');
        $value = preg_replace('/\s+/', '', $value);

        return $value;
    }
}
