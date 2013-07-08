<?php

/**
 * This is controller
 * @author Oleg Roshnivskyy
 * @package
 */
class Loader {
    static function loadClass($className) {
        $autoload_directories = array('Controller','lib');
        $startClassName=str_replace(array('_'), DIRECTORY_SEPARATOR, $className);
        foreach ($autoload_directories as $autoload_dir) {
            $className = BASE_PATH . DIRECTORY_SEPARATOR . $autoload_dir . DIRECTORY_SEPARATOR . $startClassName;

            $load = $className . ".php";
            if (file_exists($load)) {
                require_once($load);
            } else { //var_dump($load);die;
                continue;
            }

            // return true if class is loaded
            return class_exists($className, false);
        }
    }

    static function register() {
        spl_autoload_register("Loader::loadClass");
    }

    static function unregister() {
        spl_autoload_unregister("Loader::loadClass");
    }

}

Loader::register();