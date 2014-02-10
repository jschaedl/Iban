<?php

namespace Bav\Validator;

abstract class Transformation extends Iteration
{

    protected $rowIteration = array();
    protected $matrix = array();
    
    /**
     * The iteration step
     */
    protected function iterationStep()
    {
        $this->accumulator += $this->getTransformedNumber();
    }
    /**
     */
    public function setMatrix(Array $matrix)
    {
        $this->matrix = $matrix;
        if (empty($this->rowIteration)) {
            for($i = 0; $i < count($matrix); $i++) {
                $this->rowIteration[] = $i;
            
            }
            
        }
    }
    /**
     */
    public function setRowIteration(Array $rowIteration)
    {
        $this->rowIteration = $rowIteration;
    }
    /**
     * @return array
     */
    protected function getTransformationRow()
    {
        return $this->matrix[$this->rowIteration[$this->i % count($this->rowIteration)]];
    }
    /**
     * @param int $i
     * @return int
     */
    protected function getTransformedNumber()
    {
        $row = $this->getTransformationRow();
        return array_key_exists($this->number, $row)
             ? $row[$this->number]
             : 0;
    }
    
}