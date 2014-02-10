<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemA7 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System00($bankId);
        $this->validators[0]->setWeights(array(2, 1));
        
        $this->validators[] = new System03($bankId);
    }
    
}