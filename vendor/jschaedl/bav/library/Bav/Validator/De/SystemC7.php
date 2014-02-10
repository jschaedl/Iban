<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemC7 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System63($bankId);

        $this->validators[] = new System06($bankId);
        $this->validators[1]->setWeights(array(2, 3, 4, 5, 6, 7));
    }
}