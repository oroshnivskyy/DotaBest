<?php

/**
 * This is controller
 * @author Oleg Roshnivskyy
 * @package
 */
class Admin_IndexController extends EngineController{
    function GET() {
        
        $vars = Database::getConnection()->pdo->query('SELECT * FROM hero WHERE 1')->fetchAll();
        
//        var_dump($vars);exit();
        
        return $this->render('Admin/index.php',array('vars'=>$vars));
    }
}
