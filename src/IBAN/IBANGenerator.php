<?php

namespace IBAN;

class IBANGenerator
{
    private $ibanRuleFactory;
    
    public function __construct($ibanRuleFactory) {
        $this->ibanRuleFactory = $ibanRuleFactory;
    }
    
    public function generate($localeCode, $instituteIdentification, $bankAccountNumber) {
        if (empty($localeCode)) {
            throw new \InvalidArgumentException('localeCode is missing');
        } else if (empty($instituteIdentification)) {
            throw new \InvalidArgumentException('instituteIdentification is missing');
        } else if (empty($bankAccountNumber)) {
            throw new \InvalidArgumentException('bankAccountNumber is missing');
        } else if (empty(\IBAN\Constants::$ibanFormatMap[$localeCode])) {
            throw new \InvalidArgumentException('localeCode not exists');
        } else {
            $ibanRule = $this->ibanRuleFactory->createIBANRule($localeCode, $instituteIdentification);
            return $ibanRule->generateIban($bankAccountNumber);
        }
    }
}
