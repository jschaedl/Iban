<?php

namespace IBAN\Rule\DE;

class IBANRuleDE extends \IBAN\Rule\IBANRule
{
    const IBAN_RULE_CODE = '0000';
    const IBAN_RULE_VERSION = '00';
    
    const LOCALE_CODE_NORMALIZE_POSTFIX = '00';
    const INSTITUTE_IDENTIFICATION_LENGHT = 8;
    const BANK_ACCOUNT_NUMBER_LENGHT = 10;
    
    public function __construct($localeCode, $instituteIdentification) {
        parent::__construct($localeCode, $instituteIdentification);
    }
    
    public function generateIban($bankAccountNumber) {
        $this->bankAccountNumber = $bankAccountNumber;
        $normalizedLocalCode = $this->localeCode . IBANRuleDE::LOCALE_CODE_NORMALIZE_POSTFIX;
        $normalizedInstituteIdentification = str_pad($this->instituteIdentification, IBANRuleDE::INSTITUTE_IDENTIFICATION_LENGHT, '0', STR_PAD_LEFT);
        $normalizedBankAccountNumber = str_pad($this->bankAccountNumber, IBANRuleDE::BANK_ACCOUNT_NUMBER_LENGHT, '0', STR_PAD_LEFT);
        $invertedIban = $normalizedInstituteIdentification . $normalizedBankAccountNumber . $normalizedLocalCode;
        $numericRepresentationOfInvertedIban = $this->getNumericRepresentation($invertedIban);
        $checksum = $this->generateChecksum($numericRepresentationOfInvertedIban);
        return $this->localeCode . $checksum . $normalizedInstituteIdentification . $normalizedBankAccountNumber;
    }
}
