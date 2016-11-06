<?php
/**
 * Iban
 *
 * @author      Ivaylo Ivanov <i.ivanov@webmelt.de>
 * @copyright   2015 Ivaylo Ivanov
 * @link        https://github.com/I-Ivanov/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Rule\AT;

use IBAN\Rule\AbstractRule;

class Rule000000 extends AbstractRule
{
    protected function getInstituteIdentificationLength()
    {
        return 5;
    }

    protected function getBankAccountNumberLength()
    {
        return 11;
    }
}
