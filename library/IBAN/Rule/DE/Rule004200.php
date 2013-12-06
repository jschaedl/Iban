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

class Rule004200 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban()
    {
        $floatbankAccountNumber = floatval($this->bankAccountNumber);

        if (($floatbankAccountNumber >= 50462000 && $floatbankAccountNumber <= 50463999) ||
            ($floatbankAccountNumber >= 50469000 && $floatbankAccountNumber <= 50469999)) {
            return parent::generateIban ();
        }

        if (strlen($this->bankAccountNumber) != 8 || substr($this->bankAccountNumber, 3, 1) != "0") {
            return "";
        }

        $lastFive = floatval(substr($this->bankAccountNumber, - 5));
        if ($lastFive >= 0 && $lastFive <= 999) {
            return "";
        }

        return parent::generateIban ();
    }
}
