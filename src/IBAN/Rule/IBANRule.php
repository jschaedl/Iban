<?php

namespace IBAN\Rule;

abstract class IBANRule
{   
    const LOCALE_CODE_NORMALIZE_POSTFIX = '';
    const INSTITUTE_IDENTIFICATION_LENGHT = 0;
    const BANK_ACCOUNT_NUMBER_LENGHT = 0;
    
    protected $localeCode;
    protected $instituteIdentification;
    protected $bankAccountNumber;
    
    protected $normalizedLocalCode;
    protected $normalizedInstituteIdentification;
    protected $normalizedBankAccountNumber;
    
    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber) {
        $this->localeCode = $localeCode;
        $this->instituteIdentification = $instituteIdentification;
        $this->bankAccountNumber = $bankAccountNumber;
    }
    
    protected function getNumericRepresentation($letterRepresentation) {
        $numericRepresentation = '';
        foreach (str_split($letterRepresentation) as $char) {
            if (array_search($char, \IBAN\Core\Constants::$letterMapping)) {
                $numericRepresentation .= array_search($char, \IBAN\Core\Constants::$letterMapping) + 9;
            } else {
                $numericRepresentation .= $char;
            }
        }
        return $numericRepresentation;
    }
    
    protected function generateChecksum($numericRepresentationOfInvertedIban) {
        $modResult = bcmod($numericRepresentationOfInvertedIban, 97);
        $checksum = 98 - $modResult;
        if ($checksum < 10) {
            $checksum = '0' . $checksum;
        }
        return $checksum;
    }
    
    abstract public function generateIban();
}