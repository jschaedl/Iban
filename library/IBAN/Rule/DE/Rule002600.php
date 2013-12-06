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

class Rule002600 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban()
    {
        if ($this->bankAccountNumberEquals('55111') ||
            $this->bankAccountNumberEquals('8090100')) {
            // TODO skip bankAccountNumber validation (is not implemented yet)
        }

        return parent::generateIban();
    }
}
