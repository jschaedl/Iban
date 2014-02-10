<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System98 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System01($bankId);
        $this->validators[0]->setWeights(array(3, 1, 7));
        $this->validators[0]->setEnd(2);
        
        $this->validators[] = new System32($bankId);
    }
    
}