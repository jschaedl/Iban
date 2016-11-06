<?php

namespace IBAN\Rule\DE;

class Rule004400 extends \IBAN\Rule\DE\Rule000000
{
    protected function getBankAccountSubstitutions()
    {
        return array(
            "202" => "2282022"
        );
    }
}
