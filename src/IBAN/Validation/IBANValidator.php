<?php

namespace IBAN\Validation;

class IBANValidator
{
    public function validate($iban) {
        $iban = new \IBAN\Core\IBAN($iban);
        return $iban->validate();
    }
}
