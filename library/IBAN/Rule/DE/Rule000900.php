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

class Rule000900 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban()
    {
        if (strlen($this->bankAccountNumber) == 10 && $this->instituteIdentification == '68351976') {
            if (substr($this->bankAccountNumber, 0, 4) == '1116') {
                $this->bankAccountNumber = '3047' . substr($this->bankAccountNumber, 4);
            }
        }

        $this->instituteIdentification = '68351557';

        return parent::generateIban();
    }
}
