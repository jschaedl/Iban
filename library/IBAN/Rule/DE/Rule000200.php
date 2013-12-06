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

class Rule000200 extends Rule000000
{
    public function generateIban()
    {
        if (preg_match('/' . '[0-9]{7}[8]{1}[6]{1}[0-9]{1}' . '/', $this->bankAccountNumber) === 1 ||
            preg_match('/' . '[0-9]{7}[6]{1}[0-9]{2}' . '/', $this->bankAccountNumber) === 1
        ) {
            return '';
        } else {
            return parent::generateIban();
        }
    }
}
