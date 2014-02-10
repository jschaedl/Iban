<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemC9 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System00($bankId);
        $this->validators[] = new System07($bankId);
    }
    
}