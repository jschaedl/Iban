<?php
/**
 * Iban
 *
 * @author      Jan Schaedlich <schaedlich.jan@gmail.com>
 * @copyright   2013 Jan Schaedlich
 * @link        https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Rule\DE;

use IBAN\Core\Constants;
use IBAN\Rule\AbstractRule;

class Rule000000 extends AbstractRule
{
    protected $localeCode;
    protected $instituteIdentification;
    protected $bankAccountNumber;

    protected $instituteIdentificationSubstitutions = array();
    protected $bankAccountSubstitutions = array();

    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        $this->localeCode = $localeCode;
        $this->instituteIdentification = $instituteIdentification;
        $this->bankAccountNumber = $bankAccountNumber;
    }

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

    protected function getInstituteIdentificationLength()
    {
        return 8;
    }

    protected function getBankAccountNumberLength()
    {
        return 10;
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
        if (array_key_exists($this->instituteIdentification, $this->instituteIdentificationSubstitutions)) {
            $this->instituteIdentification = $this->instituteIdentificationSubstitutions[$this->instituteIdentification];
        }
    }

    private function substituteBankAccountNumbers()
    {
        if (array_key_exists($this->bankAccountNumber, $this->bankAccountSubstitutions)) {
            $this->bankAccountNumber = $this->bankAccountSubstitutions[$this->bankAccountNumber];
        }
    }
}
