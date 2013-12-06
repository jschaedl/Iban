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

class Rule003100 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban()
    {
        if (strlen($this->bankAccountNumber) != $this->getBankAccountNumberLength()) {
            return "";
        }

        return parent::generateIban ();
    }
}
