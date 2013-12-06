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

class Rule005200 extends \IBAN\Rule\DE\Rule000000
{
    public function __construct($localeCode, $instituteIdentification, $bankAccountNumber)
    {
        $replacements = array(
            "67220020#5308810004" => "60050101#0002662604"
            , "67220020#5308810000" => "60050101#0002659600"
            , "67020020#5203145700" => "60050101#7496510994"
            , "69421020#6208908100" => "60050101#7481501341"
            , "66620020#4840404000" => "60050101#7498502663"
            , "64120030#1201200100" => "60050101#7477501214"
            , "64020030#1408050100" => "60050101#7469534505"
            , "63020130#1112156300" => "60050101#0004475655"
            , "62030050#7002703200" => "60050101#7406501175"
            , "69220020#6402145400" => "60050101#7485500252"
        );

        if (isset($replacements[$instituteIdentification . "#" . $bankAccountNumber])) {
            $replacement = $replacements[$instituteIdentification . "#" . $bankAccountNumber];
            $explodedData = explode('#', $replacement);
            $instituteIdentification = $explodedData[0];
            $bankAccountNumber = $explodedData[1];

            parent::__construct($localeCode, $instituteIdentification, $bankAccountNumber);
        } else {
            throw new \Exception('no iban generation');
        }
    }
}
