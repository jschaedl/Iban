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

class Rule001900 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban()
    {
        if ($this->instituteIdentificationEquals('50130100') ||
            $this->instituteIdentificationEquals('50220200') ||
            $this->instituteIdentificationEquals('70030800')) {
            $this->instituteIdentification = '50120383';
        }

        return parent::generateIban();
    }
}
