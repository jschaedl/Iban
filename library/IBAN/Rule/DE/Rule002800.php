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

class Rule002800 extends \IBAN\Rule\DE\Rule000000
{
    protected $instituteIdentificationSubstitutions = array(
        "25050299" => "25050180"
    );
}
