<?php

namespace IBAN\Rule\DE;

class Rule000100 extends \IBAN\Rule\DE\Rule000000
{
    public function generateIban() {
        throw new \Exception('this rule is not used');
    }
}
