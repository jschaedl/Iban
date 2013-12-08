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

class Rule003400 extends \IBAN\Rule\DE\Rule000000
{
    protected $bankAccountSubstitutions = array(
        "500500500" => "4340111112",
        "502" => "4340118001"
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
