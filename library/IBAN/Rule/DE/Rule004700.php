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

class Rule004700 extends \IBAN\Rule\DE\Rule000000
{
    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        if (strlen($bankAccountNumber ) == 8) {
            $bankAccountNumber = str_pad($bankAccountNumber, $this->getBankAccountNumberLength(), '0', STR_PAD_RIGHT);
        }

        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
}
