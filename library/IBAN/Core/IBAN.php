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
namespace IBAN\Core;

class IBAN
{
    private $iban;

    public function __construct($iban)
    {
        $this->iban = $iban;
    }

    public function validate()
    {
        if (!$this->isLengthValid()) {
            return false;
        } elseif (!$this->isLocalCodeValid()) {
            return false;
        } elseif (!$this->isFormatValid()) {
            return false;
        } elseif (!$this->isChecksumValid()) {
            return false;
        } else {
            return true;
        }
    }

    public function format()
    {
        return sprintf(
            '%s %s %s %s %s %s',
            $this->getLocaleCode() . $this->getChecksum(),
            substr($this->getInstituteIdentification(), 0, 4),
            substr($this->getInstituteIdentification(), 4, 4),
            substr($this->getBankAccountNumber(), 0, 4),
            substr($this->getBankAccountNumber(), 4, 4),
            substr($this->getBankAccountNumber(), 8, 2)
        );
    }

    public function getLocaleCode()
    {
        return substr($this->iban, 0, 2);
    }

    public function getChecksum()
    {
        return substr($this->iban, 2, 2);
    }

    public function getAccountIdentification()
    {
        return substr($this->iban, 4);
    }

    public function getInstituteIdentification()
    {
        return substr($this->iban, 4, 8);
    }

    public function getBankAccountNumber()
    {
        return substr($this->iban, 12, 10);
    }

    private function isLengthValid()
    {
        return strlen($this->iban) < 15 ? false : true;
    }

    private function isLocalCodeValid()
    {
        $localeCode = $this->getLocaleCode();

        return !(isset(Constants::$ibanFormatMap[$localeCode]) === false);
    }

    private function isFormatValid()
    {
        $localeCode = $this->getLocaleCode();
        $accountIdentification = $this->getAccountIdentification();

        return !(preg_match('/' . Constants::$ibanFormatMap[$localeCode] . '/', $accountIdentification) !== 1);
    }

    private function isChecksumValid()
    {
        $localeCode = $this->getLocaleCode();
        $checksum = $this->getChecksum();
        $accountIdentification = $this->getAccountIdentification();
        $numericLocalCode = $this->getNumericLocaleCode($localeCode);
        $numericAccountIdentification = $this->getNumericAccountIdentification($accountIdentification);
        $invertedIban = $numericAccountIdentification . $numericLocalCode . $checksum;

        return bcmod($invertedIban, 97) === '1';
    }

    private function getNumericLocaleCode($localeCode)
    {
        return $this->getNumericRepresentation($localeCode);
    }

    private function getNumericAccountIdentification($accountIdentification)
    {
        return $this->getNumericRepresentation($accountIdentification);
    }

    private function getNumericRepresentation($letterRepresentation)
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
}
