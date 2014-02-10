<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemE0 extends System00
{
    protected function getResult() {
        $this->accumulator += 7;
        return parent::getResult();
    }
}
