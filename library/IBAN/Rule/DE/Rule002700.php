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

class Rule002700 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban()
    {
        if ($this->bankAccountNumberEquals('3333') ||
            $this->bankAccountNumberEquals('4444')) {
            // TODO skip bankAccountNumber validation (is not implemented yet)
        }

        return parent::generateIban();
    }
}
