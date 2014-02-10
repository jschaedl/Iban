<?php
namespace Bav\Validator;

abstract class IterationWeighted extends Iteration
{
    protected $weights = array();

    protected $modulo = 10;

    public function setWeights($weights)
    {
        $this->weights = $weights;
    }

    public function setModulo($modulo)
    {
        $this->modulo = $modulo;
    }

    public function getWeight()
    {
        return $this->weights[$this->i % count($this->weights)];
    }

    public function getWeights()
    {
        return $this->weights;
    }

    public function getModulo()
    {
        return $this->modulo;
    }
}