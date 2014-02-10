<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System06 extends System01
{
    
    protected $weights = array(2, 3, 4, 5, 6, 7);
    protected $modulo = 11;

    protected function getResult() {
        $result = $this->modulo  - $this->accumulator % $this->modulo ;
        $result = $result == $this->modulo 
                ? 0
                : $result % 10;
        return (string)$result === $this->getCheckNumber();
    }
}