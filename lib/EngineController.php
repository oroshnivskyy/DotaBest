<?php

/**
 * This is controller
 * @author Oleg Roshnivskyy
 * @package
 */
class EngineController {

    public static function render($path, $parameters = false) {
        $template_dir = BASE_PATH . DIRECTORY_SEPARATOR . 'templates';
        $path = $template_dir . DIRECTORY_SEPARATOR . $path;
        ob_start();
        if ($parameters) {
            extract($parameters);
        }
        unset($parameters);
        require $template_dir . DIRECTORY_SEPARATOR . 'layout.php';
        unset($path);
        unset($template_dir);
        return ob_get_clean();
    }
    public static function renderPartial($path,$parameters=false){
        $template_dir = BASE_PATH . DIRECTORY_SEPARATOR . 'templates';
        $path = $template_dir . DIRECTORY_SEPARATOR . $path;
        ob_start();
        if ($parameters) {
            extract($parameters);
        }
        unset($parameters);
        require $path;
        unset($path);
        unset($template_dir);
        return ob_get_clean();
    }
    public static function redirect($url){
        if($url[0]!='/'){
            $url='/'.$url;
        }
        header('Location: http://'.$_SERVER['SERVER_NAME'].$url);
        exit;
    }

}
