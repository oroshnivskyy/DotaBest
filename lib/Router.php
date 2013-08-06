<?php

/**
 *
 * Example:
 *
 * $urls = array(
 *     '/' => 'index',
 *     '/page/(\d+) => 'page'
 * );
 *
 * class page {
 *      function GET($matches) {
 *          echo "Your requested page " . $matches[1];
 *      }
 * }
 *
 * router::stick($urls);
 *
 */
class Router
{

    /**
     * stick
     *
     * the main static function of the glue class.
     *
     * @param   array        $urls          The regex-based url to class mapping
     * @throws  Exception               Thrown if corresponding class is not found
     * @throws  Exception               Thrown if no match is found
     * @throws  BadMethodCallException  Thrown if a corresponding GET,POST is not found
     *
     */
    static function stick($urls, $container)
    {

        $method = strtoupper($_SERVER['REQUEST_METHOD']);

        if ((isset($_GET['debug_enabled'])&&$_GET['debug_enabled']==1)) {
            $path = self::getUrlWithout(array('debug_enabled'));
        } else {
            $path = $_SERVER['REQUEST_URI'];
        }
        $found = false;


        foreach ($urls as $regex => $class) {
            $regex = str_replace('/', '\/', $regex);
            $regex = '^' . $regex . '\/?$';
            if (preg_match("/$regex/i", $path, $matches)) {
                $found = true;

                if (class_exists($class)) {
                    $obj = new $class($container);
                    if (method_exists($obj, $method)) {
                        return $obj->$method($matches);
                    } else {
                        throw new BadMethodCallException("Method, $method, not supported.");
                    }
                } else {
                    throw new Exception("Class, $class, not found.");
                }
                break;
            }
        }
        if (!$found) {
            throw new Exception("URL $path, not found.");
        }
    }

    static function getUrlWithout($getNames)
    {
        $url = $_SERVER['REQUEST_URI'];
        $questionMarkExp = explode("?", $url);
        $urlArray = explode("&", $questionMarkExp[1]);
        $retUrl = $questionMarkExp[0];
        $retGet = "";
        $found = array();
        foreach ($getNames as $id => $name) {
            foreach ($urlArray as $key => $value) {
                if (isset($_GET[$name]) && $value == $name . "=" . $_GET[$name])
                    unset($urlArray[$key]);
            }
        }
        $urlArray = array_values($urlArray);
        foreach ($urlArray as $key => $value) {
            if ($key < sizeof($urlArray) && $retGet !== "")
                $retGet .= "&";
            $retGet .= $value;
        }
        $retUrl .= $retGet ? '?' . $retGet : '';
        return $retUrl;
    }
}
