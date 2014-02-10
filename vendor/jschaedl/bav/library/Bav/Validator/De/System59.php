<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System59 extends System00
{
         
    public function isValid($account)
    {
        return ltrim($account, "0") != ""
            && strlen($account) < 9
            || parent::isValid($account);
    }
}