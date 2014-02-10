<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemD7 extends \Bav\Validator\IterationWeighted
{
    protected $weights = array(2, 1);
    protected $modulo = 10;

    protected function iterationStep()
    {
        $this->accumulator += Math::crossSum($this->number * $this->getWeight());
    }


    protected function getResult() {
        $result = $this->accumulator % $this->modulo;
        return (string)$result === $this->getChecknumber();
    }
}