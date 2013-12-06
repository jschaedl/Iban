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

class Rule004800 extends \IBAN\Rule\DE\Rule000000
{
    protected $instituteIdentificationSubstitutions = array(
        "10120800" => "36010200"
        , "27010200" => "36010200"
        , "60020300" => "36010200"
    );
}
