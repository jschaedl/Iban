<?php

/**
 * Copyright (C) 2012  Dennis Lassiter <dennis@lassiter.de>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 *
 * @author Dennis Lassiter <dennis@lassiter.de>
 * @copyright Copyright (C) 2012 Dennis Lassiter
 */

namespace Bav\Encoder;

class EncoderFactory
{
    protected static $encoders = array( 
            '\Bav\Encoder\Iso8859' 
         // '\Bav\Encoder\Iconv',
         // '\Bav\Encoder\Mb',
        );

    public static function create($encoding) {
        foreach (self::$encoders as $encoder) {
            if ($encoder::isSupported($encoding)) {
                return new $encoder();
            }
        }
        throw new \Exception();
    }
    
    public static function registerEncoder($class) {
        $r = new ReflectionClass($class);
        if (! $r->implementsInterface('\Bav\EncoderInterface')) {
            throw new \Exception();
        }
        self::$encoders[] = $class;
    }
    
    public static function unregisterEncoder($class) {
        if ($key = array_search($class, self::$encoders)) {
            unset(self::$encoders[$key]);
        }
    }
}
