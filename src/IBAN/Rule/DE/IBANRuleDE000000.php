<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000000 extends \IBAN\Rule\IBANRule
{   
    const LOCALE_CODE_NORMALIZE_POSTFIX = '00';
    const INSTITUTE_IDENTIFICATION_LENGHT = 8;
    const BANK_ACCOUNT_NUMBER_LENGHT = 10;
    
    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
    
    public function generateIban() {        
        $invertedIban = $this->getInvertedIban();
        $numericRepresentationOfInvertedIban = $this->getNumericRepresentation($invertedIban);
        $checksum = $this->generateChecksum($numericRepresentationOfInvertedIban);
        return $this->localeCode . $checksum . $this->normalizedInstituteIdentification . $this->normalizedBankAccountNumber;
    }
    
    private function getInvertedIban() {
        $this->normalizedLocalCode = $this->normalizeLocaleCode();
        $this->normalizedInstituteIdentification = $this->normalizeInstituteIdentification();
        $this->normalizedBankAccountNumber = $this->normalizeBankAccountNumber();
        return $this->normalizedInstituteIdentification . $this->normalizedBankAccountNumber . $this->normalizedLocalCode;
    }
    
    private function normalizeLocaleCode() {
        return $this->localeCode . IBANRuleDE000000::LOCALE_CODE_NORMALIZE_POSTFIX;
    }
    
    private function normalizeInstituteIdentification() {
        return str_pad($this->instituteIdentification, IBANRuleDE000000::INSTITUTE_IDENTIFICATION_LENGHT, '0', STR_PAD_LEFT);
    }
    
    private function normalizeBankAccountNumber() {
        return str_pad($this->bankAccountNumber, IBANRuleDE000000::BANK_ACCOUNT_NUMBER_LENGHT, '0', STR_PAD_LEFT);
    }
}
