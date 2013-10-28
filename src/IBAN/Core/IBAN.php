<?php

namespace IBAN\Core;

class IBAN
{
    private $iban;
    
    public function validate($iban) {
        $this->iban = $iban;
        if (! $this->isLengthValid()) {
            return false;
        } else if (! $this->isLocalCodeValid()) {
            return false;
        } else if (! $this->isFormatValid()) {
            return false;
        } else if (! $this->isChecksumValid()) {
            return false;
        } else {
            return true;
        }
    }

    private function isLengthValid() {
        return strlen($this->iban) < 15 ? false : true;
    }

    private function isLocalCodeValid() {
        $localeCode = $this->getLocaleCode();
        return ! (isset(\IBAN\Core\Constants::$ibanFormatMap[$localeCode]) === false);
    }

    private function isFormatValid() {
        $localeCode = $this->getLocaleCode();
        $accountIdentification = $this->getAccountIdentification();
        return ! (preg_match('/' . \IBAN\Core\Constants::$ibanFormatMap[$localeCode] . '/', $accountIdentification) !== 1);
    }

    private function isChecksumValid() {
        $localeCode = $this->getLocaleCode();
        $checksum = $this->getChecksum();
        $accountIdentification = $this->getAccountIdentification();
        $numericLocalCode = $this->getNumericLocaleCode($localeCode);
        $numericAccountIdentification = $this->getNumericAccountIdentification($accountIdentification);
        $invertedIban = $numericAccountIdentification . $numericLocalCode . $checksum;
        return bcmod($invertedIban, 97) === '1';
    }

    private function getLocaleCode() {
        return substr($this->iban, 0, 2);
    }

    private function getChecksum() {
        return substr($this->iban, 2, 2);
    }

    private function getAccountIdentification() {
        return substr($this->iban, 4);
    }

    private function getNumericLocaleCode($localeCode) {
        return $this->getNumericRepresentation($localeCode);
    }

    private function getNumericAccountIdentification($accountIdentification) {
        return $this->getNumericRepresentation($accountIdentification);
    }

    private function getNumericRepresentation($letterRepresentation) {
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
}
