<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System78 extends System00
{
    
    public function isValid($account)
    {
        return strlen($account) !== 8 && parent::isValid($account);
    }

}