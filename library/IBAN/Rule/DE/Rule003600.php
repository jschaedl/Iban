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

class Rule003600 extends \IBAN\Rule\DE\Rule000000
{
    protected $instituteIdentificationSubstitutions = array (
        "20050000" => "21050000",
        "23050000" => "21050000"
    );

    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        if (strlen($bankAccountNumber) == 6) {
            $bankAccountNumber = str_pad($bankAccountNumber, 9, '0', STR_PAD_RIGHT);
        }

        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }

    public function generateIban()
    {
        $floatBankAccountNumber = floatval($this->bankAccountNumber);
        if ($floatBankAccountNumber < 99999 ||
            ($floatBankAccountNumber >= 900000 && $floatBankAccountNumber <= 29999999) ||
            ($floatBankAccountNumber >= 60000000 && $floatBankAccountNumber <= 99999999) ||
            ($floatBankAccountNumber >= 900000000 && $floatBankAccountNumber <= 999999999) ||
            ($floatBankAccountNumber >= 2000000000 && $floatBankAccountNumber <= 2999999999) ||
            ($floatBankAccountNumber >= 7100000000 && $floatBankAccountNumber <= 8499999999) ||
            ($floatBankAccountNumber >= 8600000000 && $floatBankAccountNumber <= 8999999999)) {
            return "";
        }

        return parent::generateIban ();
    }
}
