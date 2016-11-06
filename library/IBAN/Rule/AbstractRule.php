<?php

namespace IBAN\Rule;

use IBAN\Core\Constants;

/**
 * AbstractRule
 *
 * @author      Jan Schaedlich <schaedlich.jan@gmail.com>
 * @link        https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
abstract class AbstractRule
{
    protected $localeCode;
    protected $instituteIdentification;
    protected $bankAccountNumber;

    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        $this->localeCode = $localeCode;
        $this->instituteIdentification = $instituteIdentification;
        $this->bankAccountNumber = $bankAccountNumber;
    }

    abstract protected function getInstituteIdentificationLength();
    abstract protected function getBankAccountNumberLength();

    public function generateIban()
    {
        $this->substituteInstituteIdentifications();
        $this->substituteBankAccountNumbers();
        $invertedIban = $this->getInvertedIban();
        $numericRepresentationOfInvertedIban = $this->getNumericRepresentation($invertedIban);
        $checksum = $this->generateChecksum($numericRepresentationOfInvertedIban);

        return $this->localeCode . $checksum . $this->normalizeInstituteIdentification() .
        $this->normalizeBankAccountNumber();
    }

    protected function getInstituteIdentificationSubstitutions()
    {
        return array();
    }

    protected function getBankAccountSubstitutions()
    {
        return array();
    }

    protected function getNumericRepresentation($letterRepresentation)
    {
        $numericRepresentation = '';
        foreach (str_split($letterRepresentation) as $char) {
            if (array_search($char, Constants::$letterMapping)) {
                $numericRepresentation .= array_search($char, Constants::$letterMapping) + 9;
            } else {
                $numericRepresentation .= $char;
            }
        }

        return $numericRepresentation;
    }

    protected function generateChecksum($numericRepresentationOfInvertedIban)
    {
        $modResult = bcmod($numericRepresentationOfInvertedIban, 97);
        $checksum = 98 - $modResult;
        if ($checksum < 10) {
            $checksum = '0' . $checksum;
        }

        return $checksum;
    }

    protected function instituteIdentificationEquals($instituteIdentification)
    {
        return strcmp($this->instituteIdentification,
            $instituteIdentification) == 0;
    }

    protected function bankAccountNumberEquals($bankAccountNumber)
    {
        return strcmp($this->bankAccountNumber,
            $bankAccountNumber) == 0;
    }

    protected function getLocalCodeNormalizePrefix()
    {
        return '00';
    }

    private function getInvertedIban()
    {
        return $this->normalizeInstituteIdentification() .
        $this->normalizeBankAccountNumber() . $this->normalizeLocaleCode();
    }

    private function normalizeLocaleCode()
    {
        return $this->localeCode . $this->getLocalCodeNormalizePrefix();
    }

    private function normalizeInstituteIdentification()
    {
        return str_pad($this->instituteIdentification,
            $this->getInstituteIdentificationLength(), '0', STR_PAD_LEFT);
    }

    private function normalizeBankAccountNumber()
    {
        return str_pad($this->bankAccountNumber,
            $this->getBankAccountNumberLength(), '0', STR_PAD_LEFT);
    }

    private function substituteInstituteIdentifications()
    {
        $instituteIdentificationSubstitutions = $this->getInstituteIdentificationSubstitutions();
        if (array_key_exists($this->instituteIdentification, $instituteIdentificationSubstitutions)) {
            $this->instituteIdentification = $instituteIdentificationSubstitutions[$this->instituteIdentification];
        }
    }

    private function substituteBankAccountNumbers()
    {
        $bankAccountSubstitutions = $this->getBankAccountSubstitutions();
        if (array_key_exists($this->bankAccountNumber, $bankAccountSubstitutions)) {
            $this->bankAccountNumber = $bankAccountSubstitutions[$this->bankAccountNumber];
        }
    }
}
