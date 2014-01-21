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

class Rule002002 extends \IBAN\Rule\DE\Rule000000
{
    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        $bankAccountReplacement = array (
            "50070010#9999" => "92777202"
        );

        if (isset($instituteIdentificationReplacement[$instituteIdentification . "#" . $bankAccountNumber])) {
            $bankAccountNumber = $instituteIdentificationReplacement[$instituteIdentification . "#" . $bankAccountNumber];
        }

        // Accounts from "Deutsche Bank" have to be at least 7 digits in length.
        // Leading zero's are possible
        if (strlen($bankAccountNumber) < 7) {
            $bankAccountNumber = str_pad($bankAccountNumber, 7, '0', STR_PAD_LEFT);
        }

        if (substr($instituteIdentification, 3, 1) == '7') {
            // For correct IBAN generation the sub account from "Deutsche Bank" has to be included
            if (strlen($bankAccountNumber) == 7) {
                $bankAccountNumber = str_pad($bankAccountNumber, 9, '0', STR_PAD_RIGHT);
            }
        }

        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
}
