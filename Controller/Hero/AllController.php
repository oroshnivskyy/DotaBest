<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 7/24/12
 * Time: 12:33 PM
 *
 */
class Hero_AllController extends EngineController
{
    function GET(){
        $sq = "SELECT * FROM hero ORDER BY name";
        $heroesQuery = Database::getConnection()->pdo->prepare($sq);
        $heroesQuery->execute();
        $heroes=$heroesQuery->fetchAll(PDO::FETCH_ASSOC);
        
        $metaTags = array('title'=>'Полный список героев Доты 2 которые участвуют в батле на сайте dota2best.com','description'=>'Список предоставляет вам возможность найти быстро и легко своего любимого героя и проголосовать абсолютно во всех батлах в его пользу, что б вывести его на первую позицию турнирной таблицы.','active_tab'=>'hero_list');
        
        return $this->render('Hero/list.php',array('heroes'=>$heroes, 'metaTags'=>$metaTags));
    }
}
