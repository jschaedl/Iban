<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System49 extends \Bav\Validator\Chain
{
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators = array(
            new System00($bankId),
            new System01($bankId)
        );
    }
    
}