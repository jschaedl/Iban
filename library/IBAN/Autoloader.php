<?php

namespace IBAN;

/**
 * Autoloader
 *
 * This class provides a default PSR-0 autoloader if not using Composer.
 */
class Autoloader
{
    /**
     * The project's base directory
     *
     * @var string
     */
    protected static $base;

    /**
     * Register autoloader
     */
    public static function register()
    {
        self::$base = dirname(__FILE__) . '/../';
        spl_autoload_register(array(
                new self(),
                'autoload'
        ));
    }

    /**
     * Autoload classname
     *
     * @param string $className
     *            The class to load
     */
    public static function autoload($className)
    {
        $className = ltrim($className, '\\');
        $fileName = '';
        $namespace = '';
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require self::$base . $fileName;
    }
}
