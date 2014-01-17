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
use Bav\Bav;

class IBANGenerator
{
    protected $ruleFactory;

    public static function DE($instituteIdentification, $bankAccountNumber) 
    {
        $generator = new IBANGeneratorDE();
        return $generator->generate($instituteIdentification, $bankAccountNumber);
    }
    
    public static function NL($instituteIdentification, $bankAccountNumber)
    {
    	$generator = new IBANGeneratorNL();
    	return $generator->generate($instituteIdentification, $bankAccountNumber);
    }
    
    public static function MT($instituteIdentification, $bankAccountNumber)
    {
    	$generator = new IBANGeneratorMT();
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
        
        $ibanRule = $this->ruleFactory->createIbanRule('000000', $instituteIdentification, $bankAccountNumber);

        return $ibanRule->generateIban();
    }

    protected function normalize($value)
    {
        $value = trim($value);
        $value = ltrim($value, '0');
        $value = preg_replace('/\s+/', '', $value);

        return $value;
    }
}
