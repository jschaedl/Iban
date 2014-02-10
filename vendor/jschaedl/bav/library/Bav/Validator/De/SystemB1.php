<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemB1 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System05($bankId);
        $this->validators[0]->setWeights(array(7, 3, 1));
        
        $this->validators[] = new System01($bankId);
        $this->validators[1]->setWeights(array(3, 7, 1));
    }
    
    
}