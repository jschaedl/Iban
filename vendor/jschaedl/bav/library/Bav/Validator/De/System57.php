<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System57 extends \Bav\Validator\Base
{
    
    protected $validator;
    protected $validator09;
    protected $modeMap = array();
    protected $mode1;
    protected $mode2;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validator09 = new System09($bankId);
        
        $this->mode1 = new System00($bankId);
        $this->mode1->setWeights(array(1, 2));
        $this->mode1->setStart(0);
        $this->mode1->setEnd(-2);
        
        $this->mode2 = new System00($bankId);
        $this->mode2->setWeights(array(1, 2, 0, 1, 2, 1, 2, 1, 2, 1));
        $this->mode2->setChecknumberPosition(2);
        $this->mode2->setStart(0);
        $this->mode2->setEnd(-1);
        
        $this->modeMap = array(
            51 => 1,
            55 => 1,
            61 => 1,
            64 => 1,
            65 => 1,
            66 => 1,
            70 => 1,
            73 => 1,
            88 => 1,
            94 => 1,
            95 => 1,
            
            52 => 2,
            53 => 2,
            54 => 2,
            62 => 2,
            63 => 2,
            67 => 2,
            68 => 2,
            69 => 2,
            71 => 2,
            72 => 2,
            74 => 2,
            89 => 2,
            90 => 2,
            92 => 2,
            93 => 2,
            96 => 2,
            97 => 2,
            98 => 2,
            
            40 => 3,
            50 => 3,
            91 => 3,
            99 => 3
        );
    }
    
    protected function validate()
    {
        $this->validator = null;
        switch ($this->getMode()) {
            case 0: 
                $this->validator = null;
                break;
                
            case 1:
                switch (substr($this->account, 0, 6)) {
                    case 777777: case 888888:
                        $this->validator = $this->validator09;
                        break;
                
                    default:
                        $this->validator = $this->mode1;
                        break;
                
                }
                break;
                
            case 2:
                $this->validator = $this->mode2;
                break;
                
            case 3:
                $this->validator = $this->validator09;
                break;
                
            case 4:
                $pos34 = substr($this->account, 2, 2);
                $pos79 = substr($this->account, 6, 3);
                $this->validator = $this->account === '0185125434' || ($pos34 >= 1 && $pos34 <= 12 && $pos79 <= 500)
                                 ? $this->validator09
                                 : null;
                 break;
        }
    }
    
    protected function getResult()
    {
        return ! is_null($this->validator) && $this->validator->isValid($this->account);
    }
    
    /**
     * @return int
     */
    private function getMode()
    {
        $firstTwo  = substr($this->account, 0, 2);
        
        if ($firstTwo == '00') {
            return 0;
        
        }
        
        if (isset($this->modeMap[$firstTwo])) {
            return $this->modeMap[$firstTwo];
        
        }

        if ($firstTwo >= 75 && $firstTwo <= 82) {
            return 1;
        
        } elseif (($firstTwo >= 32 && $firstTwo <= 39)
               || ($firstTwo >= 41 && $firstTwo <= 49)
               || ($firstTwo >= 56 && $firstTwo <= 60)
               || ($firstTwo >= 83 && $firstTwo <= 87)) {
            return 2;
        
        } elseif ($firstTwo >= 1 && $firstTwo <= 31) {
            return 4;
            
        } else {
            throw new \LogicException();
            
        }
    }
}