<?php

/**
 * This is controller
 * @author Oleg Roshnivskyy
 * @package
 */
class EngineController
{
    /**
     * @var \Illuminate\Container\Container $container
     */
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @return \Illuminate\Container\Container
     */
    protected function getContainer()
    {
        return $this->container;
    }

    public function render($path, $parameters = false)
    {
        $template_dir = $this->getContainer()->offsetGet('templates_folder');
        $path = $template_dir . $path;
        ob_start();
        if ($parameters) {
            extract($parameters);
        }
        unset($parameters);
        require_once $template_dir . 'layout.php';
        unset($path);
        unset($template_dir);
        return ob_get_clean();
    }

    public function renderPartial($path, $parameters = false)
    {
        $template_dir = $this->getContainer()->offsetGet('templates_folder');
        $path = $template_dir . $path;
        ob_start();
        if ($parameters) {
            extract($parameters);
        }
        unset($parameters);
        require_once $path;
        unset($path);
        unset($template_dir);
        return ob_get_clean();
    }

    public function redirect($url)
    {
        if ($url[0] != '/') {
            $url = '/' . $url;
        }
        header('Location: http://' . $_SERVER['SERVER_NAME'] . $url);
        exit;
    }

}
