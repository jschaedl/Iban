<?php
namespace Bav\Backend\Parser;

use Bav\Exception as BavException;
use Bav\Encoder\EncoderInterface;
use Bav\Encoder\EncoderFactory;
use Bav\Bank\Bank;
use Bav\Bank\Agency;
use Bav\Backend\Context\BankDataContext;
use Bav\Backend\Exception\BankNotFoundException;

class BankDataParser
{
	const FILE_ENCODING = 'ISO-8859-15';
	const BANKID_OFFSET = 0;
	const BANKID_LENGTH = 8;
	const ISMAIN_OFFSET = 8;
	const ISMAIN_LENGTH = 1;
	const NAME_OFFSET = 9;
	const NAME_LENGTH = 58;
	const POSTCODE_OFFSET = 67;
	const POSTCODE_LENGTH = 5;
	const CITY_OFFSET = 72;
	const CITY_LENGTH = 35;
	const SHORTTERM_OFFSET = 107;
	const SHORTTERM_LENGTH = 27;
	const PAN_OFFSET = 134;
	const PAN_LENGTH = 5;
	const BIC_OFFSET = 139;
	const BIC_LENGTH = 11;
	const TYPE_OFFSET = 150;
	const TYPE_LENGTH = 2;
	const ID_OFFSET = 152;
	const ID_LENGTH = 6;
	const SUCCESSORBANKID_OFFSET = 160;
	const SUCCESSORBANKID_LENGTH = 8;
	const IBANRULE_OFFSET = 168;
	const IBANRULE_LENGTH = 6;
	
	private $fp;
	private $fileName = '';
	private $lineCount = 0;
	private $lineLength = 0;
	private $encoder;
	private $contextCache;

	public function __construct($fileName, EncoderInterface $encoder = null) {
		$this->fileName = $fileName;
		$this->encoder = $encoder;
		$this->contextCache = array();
		$this->init();
	}

	public function __destruct() {
		if (is_resource($this->fp)) {
			fclose($this->fp);
		}
	}

	public function setEncoder(EncoderInterface $encoder) {
		$this->encoder = $encoder;
	}

	public function setBankFactory(BankFactoryInterface $bankFactory) {
		$this->bankFactory = $bankFactory;
	}

	public function setAgencyFactory(AgencyFactoryInterface $agencyFactory) {
		$this->agencyFactory = $agencyFactory;
	}

	public function resolveBank($bankId) {
		try {
			$this->rewind();
			if (isset($this->contextCache[$bankId])) {
				$bank = $this->findBank($bankId, $this->contextCache[$bankId]->getCurrentLineNumber(), $this->contextCache[$bankId]->getCurrentLineNumber());
			} else {
				$bank = $this->findBank($bankId, 0, $this->getLineCount());
			}
			return $bank;
		} catch (Parser\Exception\ParseException $e) {
			throw new \Bav\Exception\IoException();
		}
	}

	public function resolveAgencies($bankId) {
		try {
			$context = $this->defineBankContext($bankId);
			$agencies = array();
			for ($lineNumer = $context->getStart(); $lineNumer <= $context->getEnd(); $lineNumer++) {
				$agencies[] = $this->readAgency($lineNumer);
			}
			return $agencies;
		} catch (\Exception $e) {
			throw new \LogicException("Start and end should be defined.");
		}
	}

	private function findBank($bankId, $offset, $end) {
		if ($end - $offset < 0) {
			throw new BankNotFoundException("Bank with ID {$bankId} not found");
		}
		$lineNumber = $offset + (int) (($end - $offset) / 2);
		$tempBankId = $this->readBankId($lineNumber);
		if (!isset($this->contextCache[$tempBankId])) {
			$this->contextCache[$tempBankId] = new BankDataContext($lineNumber);
		}
		if ($tempBankId < $bankId) {
			return $this->findBank($bankId, $lineNumber + 1, $end);
		} elseif ($tempBankId > $bankId) {
			return $this->findBank($bankId, $offset, $lineNumber - 1);
		} else {
			return $this->readBank($lineNumber);
		}
	}

	private function defineBankContext($bankId) {
		if (!isset($this->contextCache[$bankId])) {
			throw new \LogicException("The contextCache object should exist!");
		}
		$context = $this->contextCache[$bankId];
		
		if (!$context->isStartDefined()) {
			for ($start = $context->getCurrentLineNumber() - 1; $start >= 0; $start--) {
				if ($this->readBankId($start) != $bankId) {
					break;
				}
			}
			$context->setStart($start + 1);
		}
		
		if (!$context->isEndDefined()) {
			for ($end = $context->getCurrentLineNumber() + 1; $end <= $this->getLineCount(); $end++) {
				if ($this->readBankId($end) != $bankId) {
					break;
				}
			}
			$context->setEnd($end - 1);
		}
		return $context;
	}

	private function readBankId($lineNumber) {
		$this->seekLine($lineNumber, self::BANKID_OFFSET);
		return $this->encoder->convert(fread($this->fp, self::BANKID_LENGTH), self::FILE_ENCODING);
	}

	private function readBank($lineNumber) {
		$line = $this->readLine($lineNumber);
		$validationType = $this->encoder->substr($line, self::TYPE_OFFSET, self::TYPE_LENGTH);
		$actualBankId = $this->encoder->substr($line, self::BANKID_OFFSET, self::BANKID_LENGTH);
		$successorBankId = trim($this->encoder->substr($line, self::SUCCESSORBANKID_OFFSET, self::SUCCESSORBANKID_LENGTH));
		
		if ($successorBankId !== '00000000') {
			$bankId = $successorBankId;
		} else {
			$bankId = $actualBankId;
		}
		
		$bank = new Bank($bankId);
		$bank->setValidationType($validationType);
		
		return $bank;
	}

	private function readAgency($lineNumber) {
		$line = $this->readLine($lineNumber);
		$id = trim($this->encoder->substr($line, self::ID_OFFSET, self::ID_LENGTH));
		$name = trim($this->encoder->substr($line, self::NAME_OFFSET, self::NAME_LENGTH));
		$shortTerm = trim($this->encoder->substr($line, self::SHORTTERM_OFFSET, self::SHORTTERM_LENGTH));
		$city = trim($this->encoder->substr($line, self::CITY_OFFSET, self::CITY_LENGTH));
		$postcode = $this->encoder->substr($line, self::POSTCODE_OFFSET, self::POSTCODE_LENGTH);
		$bic = trim($this->encoder->substr($line, self::BIC_OFFSET, self::BIC_LENGTH));
		$pan = trim($this->encoder->substr($line, self::PAN_OFFSET, self::PAN_LENGTH));
		$ibanRule = trim($this->encoder->substr($line, self::IBANRULE_OFFSET, self::IBANRULE_LENGTH));
		$mainAgency = $this->encoder->substr($line, self::ISMAIN_OFFSET, 1) === '1';
		return new Agency($id, $name, $shortTerm, $city, $postcode, $bic, $pan, $ibanRule, $mainAgency);
	}

	private function init() {
		$this->fp = @fopen($this->fileName, 'r');
		if (!is_resource($this->fp)) {
			if (!file_exists($this->fileName)) {
				throw new BavException\FileNotFoundException("File {$this->fileName} not found.");
			} else {
				throw new BavException\IoException("Failed to open stream {$this->fileName}");
			}
		}
	}

	private function rewind() {
		if (rewind($this->fp) === 0) {
			throw new BavException\IoException();
		}
	}

	private function seekLine($lineNumber, $offset = 0) {
		if (fseek($this->fp, $lineNumber * $this->getLineLength() + $offset) === -1) {
			throw new BavException\IoException();
		}
	}

	private function readLine($lineNumber) {
		$this->seekLine($lineNumber);
		return $this->encoder->convert(fread($this->fp, $this->getLineLength()), self::FILE_ENCODING);
	}

	private function getLineLength() {
		if ($this->lineLength == 0) {
			$dummyLine = fgets($this->fp, 1024);
			if (!$dummyLine) {
				throw new BavException\IoException("Failed to open stream {$this->fileName}");
			}
			$this->lineLength = strlen($dummyLine);
		}
		return $this->lineLength;
	}

	private function getLineCount() {
		if ($this->lineCount == 0) {
			clearstatcache(); // filesize() seems to be 0 sometimes
			$filesize = filesize($this->fileName);
			if (!$filesize) {
				throw new BavException\IoException("Could not read filesize for {$this->fileName}");
			}
			$this->lineCount = floor(($filesize - 1) / $this->getLineLength());
		}
		return $this->lineCount;
	}

	private function checkValidLineLength($line) {
		if ($this->encoder->strlen($line) < self::TYPE_OFFSET + self::TYPE_LENGTH) {
			throw new Exception\ParseException("Invalid line length in Line {$line}.");
		}
	}
}