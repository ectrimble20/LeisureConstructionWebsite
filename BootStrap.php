<?php

namespace Leisure;

/**
 * Class BootStrap
 * @package Leisure
 */
class BootStrap
{

    /**
     * @param $class
     */
    public static function autoLoad($class)
    {
        $prefix = 'Leisure\\';
        $base_dir = __DIR__ . "/";
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            return;
        }
        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
        //error_log("Autoload File: ". $file); //enable for debug-trace of loading
        if (file_exists($file)) {
            require $file;
        }
    }

    /**
     *
     */
    public static function registerAutoLoader()
    {
        spl_autoload_register(__NAMESPACE__ . "\\BootStrap::autoLoad");
    }

}