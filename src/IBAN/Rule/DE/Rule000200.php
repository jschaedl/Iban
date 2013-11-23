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

class Rule000200 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban() {
    	if (preg_match('/' . '[0-9A-Z]{7}[8]{1}[6]{1}[0-9A-Z]{1}' . '/', $this->bankAccountNumber) === 1 || 
            preg_match('/' . '[0-9A-Z]{7}[6]{1}[0-9A-Z]{2}' . '/', $this->bankAccountNumber) === 1) {
    		return '';
        } else { 
            return parent::generateIban();
        }
    }
}
