<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemD3 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System00($bankId);
        $this->validators[] = new System27($bankId);
    }
    
    
}