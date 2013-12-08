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

class Rule002100 extends \IBAN\Rule\DE\Rule000000
{
    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        parent::__construct($localeCode, '36020030', $bankAccountNumber);
    }
}
