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

use IBAN\Rule\AbstractRule;

class Rule000000 extends AbstractRule
{
    protected function getInstituteIdentificationLength()
    {
        return 8;
    }

    protected function getBankAccountNumberLength()
    {
        return 10;
    }
}
