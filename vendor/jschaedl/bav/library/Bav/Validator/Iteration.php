<?php
namespace Bav\Validator;

abstract class Iteration extends Base
{
    protected $i = 0;

    protected $position = 0;

    protected $number = 0;

    protected $accumulator = 0;

    protected $start = - 2;

    protected $end = 0;

    abstract protected function iterationStep();

    protected function init($account)
    {
        parent::init($account);
        $this->accumulator = 0;
    }

    protected function validate()
    {
        $start = Math::getNormalizedPosition($this->account, $this->start);
        $end = Math::getNormalizedPosition($this->account, $this->end);
        $length = abs($end - $start) + 1;
        
        $this->position = $start;
        $stepping = (($end - $start < 0) ? - 1 : + 1);
        
        for ($this->i = 0; $this->i < $length; $this->i ++) {
            $this->number = (int) $this->account{$this->position};
            $this->iterationStep();
            $this->position += $stepping;
        }
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end)
    {
        $this->end = $end;
    }
}