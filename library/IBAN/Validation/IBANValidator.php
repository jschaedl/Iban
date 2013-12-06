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
namespace IBAN\Validation;

class IBANValidator
{
    public function validate($ibanString)
    {
        $iban = new \IBAN\Core\IBAN($ibanString);

        return $iban->validate();
    }
}
