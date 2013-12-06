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

class Rule003000 extends \IBAN\Rule\DE\Rule000000
{
    // 003000 is equal to 000000,
    // if there is no check for the checksum inside bankAccountNumber
}
