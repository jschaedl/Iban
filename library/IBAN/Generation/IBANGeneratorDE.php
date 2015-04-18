<?php
namespace IBAN\Generation;

use IBAN\Rule\RuleFactory;
use IBAN\Rule\RuleFactoryInterface;
use Bav\Bav;

/**
 * IBANGeneratorDE
 *
 * @author Jan Schaedlich <schaedlich.jan@gmail.com>
 * @copyright 2013 Jan Schaedlich
 * @link https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
class IBANGeneratorDE extends IBANGenerator
{    
	protected $bav;
	
    public function __construct()
    {
        parent::__construct(RuleFactory::DE());
        $this->bav = Bav::DE();
    }

    public function generate($instituteIdentification, $bankAccountNumber)
    {
        $instituteIdentification = $this->prepareAndCheckInstituteIdentification($instituteIdentification);
        $bankAccountNumber = $this->prepareAndCheckBankAccountNumber($bankAccountNumber);
        
         $bank = $this->bav->getBank($instituteIdentification);
         $mainAgency = $bank->getMainAgency();
         $ibanRuleCodeAndVersion = $mainAgency->getIbanRule();

         //if (!$bank->isValid($bankAccountNumber)) {
         	//throw new \Exception('bankAccountNumber is not valid');
         //}
        
        $ibanRule = $this->ruleFactory->createIbanRule($ibanRuleCodeAndVersion, $bank->getBankId(), $bankAccountNumber);

        return $ibanRule->generateIban();
    }
}
