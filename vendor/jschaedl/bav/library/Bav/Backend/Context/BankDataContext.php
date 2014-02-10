<?php
namespace Bav\Backend\Context;

class BankDataContext
{
	private $line = 0;
	private $start = null;
	private $end = null;

	public function __construct($line) {
		$this->line = $line;
	}

	public function getCurrentLineNumber() {
		return $this->line;
	}

	public function getStart() {
		if (is_null($this->start)) {
			throw new \Exception();
		}
		return $this->start;
	}

	public function getEnd() {
		if (is_null($this->end)) {
			throw new \Exception();
		}
		return $this->end;
	}

	public function setStart($start) {
		$this->start = $start;
	}

	public function setEnd($end) {
		$this->end = $end;
	}

	public function isStartDefined() {
		return !is_null($this->start);
	}

	public function isEndDefined() {
		return !is_null($this->end);
	}
}
