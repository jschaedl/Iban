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

class Rule004300 extends \IBAN\Rule\DE\Rule000000
{
    protected $instituteIdentificationSubstitutions = array (
        "60651070" => "66650085"
    );
}
