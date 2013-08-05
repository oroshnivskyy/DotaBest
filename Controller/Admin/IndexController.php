<?php
namespace Admin;

use EngineController;
use Database;
use PDO;

class IndexController extends EngineController
{
    function GET()
    {

        $vars = Database::getConnection()->pdo->query('SELECT * FROM hero WHERE 1')->fetchAll();

//        var_dump($vars);exit();

        return $this->render('Admin/index.php', array('vars' => $vars));
    }
}
