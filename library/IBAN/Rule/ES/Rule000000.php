<?php

namespace IBAN\Rule\ES;

use IBAN\Rule\AbstractRule;

class Rule000000 extends AbstractRule
{
    protected function getInstituteIdentificationLength()
    {
        return 4;
    }

    protected function getBankAccountNumberLength()
    {
        return 16;
    }
}
