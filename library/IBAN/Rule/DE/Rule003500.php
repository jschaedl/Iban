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

class Rule003500 extends \IBAN\Rule\DE\Rule000000
{
    protected $bankAccountSubstitutions = array(
        "9696" => "1490196966"
    );

    public function generateIban()
    {
        if (intval($this->bankAccountNumber) >= 800000000 &&
            intval($this->bankAccountNumber) <= 899999999) {
            return "";
        }

        return parent::generateIban ();
    }
}
