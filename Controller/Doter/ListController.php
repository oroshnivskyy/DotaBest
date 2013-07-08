<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 7/25/12
 * Time: 10:25 PM
 *
 */
class Doter_ListController extends EngineController
{
    function GET(){
        $uq=Database::getConnection()->pdo->query('SELECT u .id, u.name, u.team_name,u.score , COUNT( c.id ) AS comments_count
FROM user u
LEFT JOIN comments c ON ( u.id = c.owner_id
AND c.type =4 )
GROUP BY u.id
ORDER BY u.score DESC');
        $uq->execute();
        return $this->render('Doter/list.php',array('doters'=>$uq->fetchAll(PDO::FETCH_ASSOC),'metaTags'=>array('title'=>'Список игроков','description'=>'Список лучших игроков в Dota2.','active_tab'=>'doter_list')));
    }
}
