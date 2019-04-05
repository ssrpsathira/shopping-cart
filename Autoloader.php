<?php

/**
 * Autoloader for class imports
 *
 * Class Autoloader
 */
class Autoloader
{
    /**
     * Include the class using FQCN using autoloader
     *
     * @param $className
     * @return bool
     */
    static public function loader($className)
    {
        $filename = str_replace("\\", '/', $className) . ".php";

        if (file_exists($filename)) {
            include($filename);

            if (class_exists($className)) {

                return true;
            }
        }

        return false;
    }
}

spl_autoload_register('Autoloader::loader');
