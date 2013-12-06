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

class Rule004900 extends \IBAN\Rule\DE\Rule000000
{
    protected $bankAccountSubstitutions = array(
        "36" => "2310113"
        , "936" => "2310113"
        , "999" => "1310113"
        , "6060" => "160602"
    );

    public function generateIban()
    {
        if ($this->instituteIdentificationEquals('30060010') ||
            $this->instituteIdentificationEquals('40060000') ||
            $this->instituteIdentificationEquals('57060000')) {
            $this->bankAccountNumber = str_pad($this->bankAccountNumber, $this->getBankAccountNumberLength(), '0', STR_PAD_LEFT);
            if (substr($this->bankAccountNumber, 4, 1) == '9') {
                $this->bankAccountNumber = substr($this->bankAccountNumber, 4) . substr($this->bankAccountNumber, 0, 4);
            }
        }

        return parent::generateIban();
    }
}
