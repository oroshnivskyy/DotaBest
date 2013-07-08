<?php

/**
 * This is controller
 * @author Oleg Roshnivskyy
 * @package
 */
class Error_Error404 {
    public static function show($message){
//        echo $message;
        header('HTTP/1.0 404 Not found.');
        echo "<h1>404 {$message}</h1>";
        echo "The page that you have requested could not be found.";
        exit();
    }
}
