<?php

namespace IBAN\Rule\DE;

class IBANRuleDE000100 extends \IBAN\Rule\DE\IBANRuleDE000000
{
    public function generateIban() {
        throw new \Exception('this rule is not used');
    }
}
