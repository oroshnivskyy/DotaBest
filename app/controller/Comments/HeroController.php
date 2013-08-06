<?php
namespace Comments;

use EngineController;
use Database;
use PDO;

class HeroController extends EngineController
{
    function GET()
    {
        return $this->render('Comments/index.php', array());
    }
}

