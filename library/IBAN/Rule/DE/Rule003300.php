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

class Rule003300 extends \IBAN\Rule\DE\Rule000000
{
    protected $bankAccountSubstitutions = array(
        "22222" => "5803435253",
        "1111111" => "39908140",
        "94" => "2711931",
        "7777777" => "5800522694",
        "55555" => "5801800000"
    );

    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        if (intval($bankAccountNumber) >= 800000000 &&
            intval($bankAccountNumber) <= 899999999) {
            $instituteIdentification = "70020270";
        }

        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
}
