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
    
    public static function AT($instituteIdentification, $bankAccountNumber)
    {
        $generator = new IBANGeneratorAT();
        return $generator->generate($instituteIdentification, $bankAccountNumber);
    }

    public function __construct(RuleFactoryInterface $ruleFactory)
    {
        $this->ruleFactory = $ruleFactory;
    }

    public function generate($instituteIdentification, $bankAccountNumber)
    {
        $instituteIdentification = $this->prepareAndCheckInstituteIdentification($instituteIdentification);
        $bankAccountNumber = $this->prepareAndCheckBankAccountNumber($bankAccountNumber);
        
        $ibanRule = $this->ruleFactory->createIbanRule('000000', $instituteIdentification, $bankAccountNumber);

        return $ibanRule->generateIban();
    }

    protected function prepareAndCheckInstituteIdentification($instituteIdentification)
    {
        $instituteIdentification = $this->normalize($instituteIdentification);
        
        if (empty($instituteIdentification)) {
            throw new \InvalidArgumentException('instituteIdentification is missing');
        }
        
        return $instituteIdentification;
    }
    
    protected function prepareAndCheckBankAccountNumber($bankAccountNumber)
    {
        $bankAccountNumber = $this->normalize($bankAccountNumber);
        
        if (empty($bankAccountNumber)) {
            throw new \InvalidArgumentException('bankAccountNumber is missing');
        }
        
        return $bankAccountNumber;
    }
    
    protected function normalize($value)
    {
        $value = trim($value);
        $value = ltrim($value, '0');
        $value = preg_replace('/\s+/', '', $value);

        return $value;
    }
}
