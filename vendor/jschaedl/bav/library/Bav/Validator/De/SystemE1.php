<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemE1 extends System00
{
    protected $substitutions = array(48, 49, 50, 51, 52, 53, 54, 55, 56, 57);
    protected $weights = array(1, 2, 3, 4, 5, 6, 11, 10, 9);
    protected $modulo = 11;

    protected function iterationStep() {
        $this->accumulator += $this->substitutions[$this->number] * $this->getWeight();
    }

    protected function getResult() {
        $result = $this->accumulator % $this->modulo;
        if ($result == 10) {
            return false;
        }   
        return (string) $result === $this->getCheckNumber();
    }
}
