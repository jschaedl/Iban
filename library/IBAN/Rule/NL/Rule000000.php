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
namespace IBAN\Rule\NL;

use IBAN\Rule\AbstractRule;

class Rule000000 extends AbstractRule
{
    protected function getInstituteIdentificationLength()
    {
        return 4;
    }

    protected function getBankAccountNumberLength()
    {
        return 10;
    }
}
