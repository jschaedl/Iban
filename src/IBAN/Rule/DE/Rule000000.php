<?php

namespace IBAN\Rule\DE;

use IBAN\Rule\IBANRule;

class Rule000000 extends IBANRule
{   
    public function generateIban() {        
        $invertedIban = $this->getInvertedIban();
        $numericRepresentationOfInvertedIban = $this->getNumericRepresentation($invertedIban);
        $checksum = $this->generateChecksum($numericRepresentationOfInvertedIban);
        return $this->localeCode . $checksum . $this->normalizedInstituteIdentification . $this->normalizedBankAccountNumber;
    }
    
    public function getLocalCodeNormalizePrefix() {
        return '00';
    }
    
    public function getInstituteIdentificationLength() {
        return 8;
    }
    
    public function getbankAccountNumberLength() {
        return 10;
    }
    
    private function getInvertedIban() {
        $this->normalizedLocalCode = $this->normalizeLocaleCode();
        $this->normalizedInstituteIdentification = $this->normalizeInstituteIdentification();
        $this->normalizedBankAccountNumber = $this->normalizeBankAccountNumber();
        return $this->normalizedInstituteIdentification . $this->normalizedBankAccountNumber . $this->normalizedLocalCode;
    }
    
    private function normalizeLocaleCode() {
        return $this->localeCode . $this->getLocalCodeNormalizePrefix();
    }
    
    private function normalizeInstituteIdentification() {
        return str_pad($this->instituteIdentification, $this->getInstituteIdentificationLength(), '0', STR_PAD_LEFT);
    }
    
    private function normalizeBankAccountNumber() {
        return str_pad($this->bankAccountNumber, $this->getbankAccountNumberLength(), '0', STR_PAD_LEFT);
    }
}
