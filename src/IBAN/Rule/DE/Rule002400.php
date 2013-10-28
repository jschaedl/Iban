<?php

namespace IBAN\Rule\DE;

class Rule002400 extends \IBAN\Rule\DE\Rule000000
{    
    protected $bankAccountSubstitutions = array(
        "94" => "1694"
        , "248" => "17248"
        , "345" => "17345"
        , "400" => "14400"
    );
}
