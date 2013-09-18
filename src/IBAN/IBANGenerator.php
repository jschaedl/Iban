<?php

namespace IBAN;

class IBANGenerator
{
    private $localeCode;
    private $instituteIdentification;
    private $bankAccountNumber;
    
    public function generate($localeCode, $instituteIdentification, $bankAccountNumber) {
        $this->localeCode = $localeCode;
        $this->instituteIdentification = $instituteIdentification;
        $this->bankAccountNumber = $bankAccountNumber;
        if ($this->checkParameters()) {
            $normalizedLocalCode = $localeCode . '00';
            $normalizedInstituteIdentification = str_pad($instituteIdentification, 8, '0', STR_PAD_LEFT);
            $normalizedBankAccountNumber = str_pad($bankAccountNumber, 10, '0', STR_PAD_LEFT);
            $invertedIban = $normalizedInstituteIdentification . $normalizedBankAccountNumber . $normalizedLocalCode;
            $numericRepresentationOfInvertedIban = $this->getNumericRepresentation($invertedIban);
            $modResult = bcmod($numericRepresentationOfInvertedIban, 97);
            $checksum = 98 - $modResult; 
            if ($checksum < 10) {
                $checksum = '0' . $checksum;  
            }
            return $localeCode . $checksum . $normalizedInstituteIdentification . $normalizedBankAccountNumber;
        }
    }

    private function checkParameters() {
        if (! isset($this->localeCode) || $this->localeCode == '') {
            throw new \InvalidArgumentException('localeCode is missing');
        }
        if (! isset($this->instituteIdentification) || $this->instituteIdentification == '') {
            throw new \InvalidArgumentException('instituteIdentification is missing');
        }
        if (! isset($this->bankAccountNumber) || $this->bankAccountNumber == '') {
            throw new \InvalidArgumentException('bankAccountNumber is missing');
        }
        if (! (isset(\IBAN\Constants::$ibanFormatMap[$this->localeCode]))) {
            throw new \InvalidArgumentException('localeCode not exists');
        }
        return true;
    }
    
    private function getNumericRepresentation($letterRepresentation) {
        foreach (str_split($letterRepresentation) as $char) {
            if (array_search($char, \IBAN\Constants::$letterMapping)) {
                $numericRepresentation .= array_search($char, \IBAN\Constants::$letterMapping) + 9;
            } else {
                $numericRepresentation .= $char;
            }
        }
        return $numericRepresentation;
    }
}
