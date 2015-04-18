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
    const LOCALECODE_OFFSET = 0;
    const LOCALECODE_LENGTH = 2;
    const CHECKSUM_OFFSET = 2;
    const CHECKSUM_LENGTH = 2;
    const ACCOUNTIDENTIFICATION_OFFSET = 4;
    const INSTITUTEIDENTIFICATION_OFFSET = 4;
    const INSTITUTEIDENTIFICATION_LENGTH = 8;
    const BANKACCOUNTNUMBER_OFFSET = 12;
    const BANKACCOUNTNUMBER_LENGTH = 10;
    const IBAN_MIN_LENGTH = 15;
    
    private $iban;

    public function __construct($iban)
    {
        $this->iban = $this->normalize($iban);
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
        return substr($this->iban, IBAN::LOCALECODE_OFFSET, IBAN::LOCALECODE_LENGTH);
    }

    public function getChecksum()
    {
        return substr($this->iban, IBAN::CHECKSUM_OFFSET, IBAN::CHECKSUM_LENGTH);
    }

    public function getAccountIdentification()
    {
        return substr($this->iban, IBAN::ACCOUNTIDENTIFICATION_OFFSET);
    }

    public function getInstituteIdentification()
    {
        return substr($this->iban, IBAN::INSTITUTEIDENTIFICATION_OFFSET, IBAN::INSTITUTEIDENTIFICATION_LENGTH);
    }

    public function getBankAccountNumber()
    {
        return substr($this->iban, IBAN::BANKACCOUNTNUMBER_OFFSET, IBAN::BANKACCOUNTNUMBER_LENGTH);
    }

    private function isLengthValid()
    {
        return strlen($this->iban) < IBAN::IBAN_MIN_LENGTH ? false : true;
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
    
    private function normalize($iban)
    {
        $value = trim($iban);
        $value = preg_replace('/\s+/', '', $value);
    
        return $value;
    }
}
