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

class Rule001700 extends \IBAN\Rule\DE\Rule000000
{
    protected $bankAccountSubstitutions = array(
        "100" => "2009090013"
        , "111" => "2111111017"
        , "240" => "2100240010"
        , "4004" => "2204004016"
        , "4444" => "2044444014"
        , "6060" => "2016060014"
        , "102030" => "1102030016"
        , "333333" => "2033333016"
        , "909090" => "2009090013"
        , "50005000" => "5000500013"
    );
}
