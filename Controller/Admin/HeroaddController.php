<?php

/**
 * This is controller
 * @author Oleg Roshnivskyy
 * @package
 */
class Admin_HeroaddController extends EngineController{
    function GET() {
        
        $vars = '';
        
        return $this->render('Admin/index.php',array('vars'=>$vars));
    }
}
