<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System11 extends System10
{
    
    protected function getResult() {
        $result = $this->modulo - $this->accumulator % $this->modulo;
        switch ($result) {
            case 11:
                $result = 0;
                break;
            case 10:
                $result = 9;
                break;
        }
        return (string)$result === $this->getCheckNumber();
    }

}