<?php

namespace IBAN\Validation;

class IBANValidator
{
    public function validate($ibanString) {
        $iban = new \IBAN\Core\IBAN;
        return $iban->validate($ibanString);
    }
}
