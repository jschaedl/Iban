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

class Rule000300 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban()
    {
        if ($this->bankAccountNumberEquals('6161604670')) {
            return '';
        } else {
            return parent::generateIban();
        }
    }
}
