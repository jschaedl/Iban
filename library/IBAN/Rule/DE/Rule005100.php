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

class Rule005100 extends \IBAN\Rule\DE\Rule000000
{
    protected $bankAccountSubstitutions = array(
            "333" => "7832500881"
            , "502" => "1108884"
            , "500500500" => "5005000"
            , "502502502" => "1108884"
    );
}
