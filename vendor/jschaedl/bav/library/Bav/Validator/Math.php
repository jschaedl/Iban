<?php
namespace Bav\Validator;

class Math
{
    /**
     * Calculate the crosssum of an integer
     *
     * @param int $int            
     * @return int
     */
    public static function crossSum($int)
    {
        $sum = 0;
        $strInt = (string) $int;
        
        for ($i = 0; $i < strlen($strInt); $i ++) {
            $sum += $strInt{$i};
        }
        
        return $sum;
    }

    public static function isBetween($account, $a, $b)
    {
        $account = (int) ltrim($account, '0');
        
        return $a < $b ? $account >= $a && $account <= $b : $account >= $b && $account <= $a;
    }

    public static function getNormalizedPosition($account, $position)
    {
        if ($position >= strlen($account) || $position < - strlen($account)) {
            throw new Exception\OutOfBoundsException("Cannot access offset {$position} in String {$account}");
        }
        
        if ($position >= 0) {
            return $position;
        }
        
        return strlen($account) + $position;
    }
}