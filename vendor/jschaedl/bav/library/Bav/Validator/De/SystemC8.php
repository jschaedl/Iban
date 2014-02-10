<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemC8 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System00($bankId);
        $this->validators[] = new System04($bankId);
        $this->validators[] = new System07($bankId);
    }
    
    
}