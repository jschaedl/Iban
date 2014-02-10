<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemA2 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System00($bankId);
        $this->validators[0]->setWeights(array(2, 1));
        
        $this->validators[] = new System04($bankId);
        $this->validators[1]->setWeights(array(2, 3, 4, 5, 6, 7));
    }
}