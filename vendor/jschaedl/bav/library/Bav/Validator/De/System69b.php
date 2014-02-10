<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System69b extends \Bav\Validator\Transformation
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $matrix = array(
            array(0,1,5,9,3,7,4,8,2,6),
            array(0,1,7,6,9,8,3,2,5,4),
            array(0,1,8,4,6,2,9,5,7,3),
            array(0,1,2,3,4,5,6,7,8,9)
        );
        $this->setMatrix($matrix);
    }
    
    /**
     * @return bool
     */
    protected function getResult() {
        $result = (10 - ($this->accumulator % 10)) % 10;
        return (string)$result === $this->getChecknumber();
    }
}