<?php
namespace IBAN\Generation;

use IBAN\Rule\RuleFactory;
use IBAN\Rule\RuleFactoryInterface;

class IBANGeneratorES extends IBANGenerator
{
    public function __construct()
    {
        parent::__construct(RuleFactory::ES());
    }

    public function generate($instituteIdentification, $bankAccountNumber)
    {
        $bankAccountNumber = $this->prepareAndCheckBankAccountNumber($bankAccountNumber);
        $ibanRule = $this->ruleFactory->createIbanRule('000000', 1465, $bankAccountNumber);

        return $ibanRule->generateIban();
    }
}
