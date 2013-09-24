<?php

namespace IBAN\Rule;

class IBANRule
{   
    const LOCALE_CODE_NORMALIZE_POSTFIX = '';
    const INSTITUTE_IDENTIFICATION_LENGHT = 0;
    const BANK_ACCOUNT_NUMBER_LENGHT = 0;
    
    protected $localeCode;
    protected $instituteIdentification;
    protected $bankAccountNumber;
    
    public function __construct($localeCode, $instituteIdentification) {
        $this->localeCode = $localeCode;
        $this->instituteIdentification = $instituteIdentification;
    }
    
    public function generateIban($bankAccountNumber) {
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
}