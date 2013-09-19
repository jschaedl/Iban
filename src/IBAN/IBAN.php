<?php

namespace IBAN;

class IBAN
{
    private $iban;

    public function __construct($iban) {
        $this->iban = $iban;
    }

    public function validate() {
        if (! $this->hasIbanValidLenght()) {
            return false;
        } else if (! $this->hasIbanValidLocaleCode()) {
            return false;
        } else if (! $this->hasIbanValidFormat()) {
            return false;
        } else if (! $this->hasIbanValidChecksum()) {
            return false;
        } else {
            return true;
        }
    }

    private function hasIbanValidLenght() {
        return strlen($this->iban) < 15 ? false : true;
    }

    private function hasIbanValidLocaleCode() {
        $localeCode = $this->getLocaleCode();
        return ! (isset(\IBAN\Constants::$ibanFormatMap[$localeCode]) === false);
    }

    private function hasIbanValidFormat() {
        $localeCode = $this->getLocaleCode();
        $accountIdentification = $this->getAccountIdentification();
        return ! (preg_match('/' . \IBAN\Constants::$ibanFormatMap[$localeCode] . '/', $accountIdentification) !== 1);
    }

    private function hasIbanValidChecksum() {
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
