<?php
namespace Bav;

use Bav\Backend\BankDataResolverInterface;
use Bav\Encoder\EncoderFactory;
use Bav\Backend\Parser\BankDataParser;
use Bav\Backend\BankDataResolver;
use Bav\Exception\BankDataResolverNotAvailableException;

class Bav
{
    const DEFAULT_LOCALE = 'DE';

    const DEFAULT_ENCODING = 'ISO-8859-15';

    private $bankDataFile;

    private $bankDataResolvers = array();

    public function __construct()
    {}

    public static function DE()
    {
        $bankDataFile = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'tests/data/blz_2013_12_09_txt.txt';
        
        $parser = new BankDataParser($bankDataFile);
        $parser->setEncoder(EncoderFactory::create(Bav::DEFAULT_ENCODING));
        
        $bav = new Bav();
        $bav->setBankDataResolver(new BankDataResolver($parser));
        
        return $bav;
    }

    public function getBank($bankCode, $locale = Bav::DEFAULT_LOCALE)
    {
        return $this->getBankDataResolver($locale)->getBank($bankCode);
    }

    public function bankExists($bankCode, $locale = Bav::DEFAULT_LOCALE)
    {
        return $this->getBankDataResolver($locale)->bankExists($bankCode);
    }

    public function getBankDataResolver($locale)
    {
        $locale = strtoupper($locale);
        if (isset($this->bankDataResolvers[$locale])) {
            return $this->bankDataResolvers[$locale];
        }
        throw new BankDataResolverNotAvailableException();
    }

    public function setBankDataResolver(BankDataResolverInterface $bankDataResolver, $locale = Bav::DEFAULT_LOCALE)
    {
        $this->bankDataResolvers[strtoupper($locale)] = $bankDataResolver;
    }
}
