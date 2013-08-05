<?php
namespace Admin;

use EngineController;
use Database;
use PDO;

class HeroaddController extends EngineController
{
    function GET()
    {

        $vars = '';

        return $this->render('Admin/index.php', array('vars' => $vars));
    }
}
