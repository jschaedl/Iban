<?php
/**
 * Iban
 *
 * @author      Jan Schaedlich <schaedlich.jan@gmail.com>
 * @copyright   2013 Jan Schaedlich
 * @link        https://github.com/jschaedl/Iban
 *
 * MIT LICENSE
 */
namespace IBAN\Rule\DE;

class Rule001501 extends \IBAN\Rule\DE\Rule000000
{
    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        parent::__construct($localeCode, '37060193', $bankAccountNumber);
    }

    protected $bankAccountSubstitutions = array(
        "94" => "3008888018"
        , "556" => "101010"
        , "888" => "31870011"
        , "4040" => "4003600101"
        , "5826" => "1015826017"
        , "25000" => "25000110"
        , "393393" => "33013019"
        , "444555" => "32230016"
        , "603060" => "6002919018"
        , "2120041" => "2130041"
        , "80868086" => "4007375013"
        , "400569017" => "4000569017"
    );
}
