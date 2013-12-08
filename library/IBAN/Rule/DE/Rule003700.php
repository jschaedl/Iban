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

class Rule003700 extends \IBAN\Rule\DE\Rule000000
{
    protected $instituteIdentificationSubstitutions = array(
        "20110700" => "30010700"
    );
}
