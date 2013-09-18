<?php

namespace IBAN;

class IBANValidator
{
    public function validate($iban) {
        $iban = new IBAN($iban);
        return $iban->validate();
    }
}
