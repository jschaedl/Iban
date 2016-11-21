<?php
/**
 * Iban
 *
 * @author      Stefan Warnat
 * @link        https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Rule\DE;

class Rule004201 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban()
    {
        $floatbankAccountNumber = floatval($this->bankAccountNumber);

        if (strlen($this->bankAccountNumber) == 8) {
            // nnn 0 0000 to nnn 0 0999 are not converted
            $lastFive = floatval(substr($this->bankAccountNumber, - 5));
            if ($lastFive >= 0 && $lastFive <= 999) {
                return "";
            }

            if (substr($this->bankAccountNumber, 3, 1) == 0 ||
                ($floatbankAccountNumber >= 50462000 && $floatbankAccountNumber <= 50463999) ||
                ($floatbankAccountNumber >= 50469000 && $floatbankAccountNumber <= 50469999)) {
                return parent::generateIban();
            }
        }

        if (strlen($this->bankAccountNumber) == 10) {
            // only nnn 44 00001 to nnn 44 99999 can be converted
            $lastSeven = floatval(substr($this->bankAccountNumber, - 7));
            if ($lastSeven >= 4400001 && $lastSeven <= 4499999) {
                return parent::generateIban ();
            }
        }

        return "";
    }
}
