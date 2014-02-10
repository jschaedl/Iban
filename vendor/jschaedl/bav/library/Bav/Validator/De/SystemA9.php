<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemA9 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System01($bankId);
        $this->validators[0]->setWeights(array(3, 7, 1));
        
        $this->validators[] = new System06($bankId);
        $this->validators[1]->setWeights(array(2, 3, 4, 5, 6, 7));
    }
    
}