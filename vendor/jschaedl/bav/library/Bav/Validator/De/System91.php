<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System91 extends \Bav\Validator\Chain
{

    protected $modeF;
    
    public function __construct($bankId)
    {

        parent::__construct($bankId);
        for ($i = 0; $i < 4; $i++) {
            $this->validators[] = new System06($bankId);
            $this->validators[$i]->setChecknumberPosition(6);
            $this->validators[$i]->setStart(5);
        }
        
        $this->validators[0]->setWeights(array(2, 3, 4, 5, 6, 7));
        $this->validators[1]->setWeights(array(7, 6, 5, 4, 3, 2));
        $this->validators[2]->setWeights(array(2, 3, 4, 0, 5, 6, 7, 8, 9, 10));
        $this->validators[3]->setWeights(array(2, 4, 8, 5, 10, 9));
        
        $this->validators[2]->setStart(-1);
    }

}