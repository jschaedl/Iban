<?php
/**
 * Iban
 *
 * @author      Dennis Lassiter <dennis@lassiter.de>
 * @copyright   2013 Dennis Lassiter
 * @link        https://github.com/pulseit-dennis/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Rule\DE;

class Rule005700 extends \IBAN\Rule\DE\Rule000000
{
    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        if ($instituteIdentification == '50810900') {
            $instituteIdentification = '66010200';
        }
        parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
    }
}
