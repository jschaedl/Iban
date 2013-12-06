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

class Rule004100 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban()
    {
        if ($this->instituteIdentificationEquals('62220000')) {
            return "DE96500604000000011404";
        }

        return parent::generateIban ();
    }
}
