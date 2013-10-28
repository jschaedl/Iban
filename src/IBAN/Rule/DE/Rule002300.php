<?php

namespace IBAN\Rule\DE;

class Rule002300 extends \IBAN\Rule\DE\Rule000000
{    
    protected $bankAccountSubstitutions = array(
        "700" => "1000700800"
    );
}
