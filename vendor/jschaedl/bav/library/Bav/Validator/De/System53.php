<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System53 extends System52
{
    
    protected function normalizeAccount($account, $size)
    {
        return $this->getEser9($account);
    }
    
}