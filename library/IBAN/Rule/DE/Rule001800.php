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
namespace IBAN\Rule\DE;

class Rule001800 extends \IBAN\Rule\DE\Rule000000
{
    protected $bankAccountSubstitutions = array(
        "556" => "120440110"
        , "5435435430" => "543543543"
        , "2157" => "121787016"
        , "9800" => "120800019"
        , "202050" => "1221864014"
    );
}
