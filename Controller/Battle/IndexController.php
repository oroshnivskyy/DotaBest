<?php
namespace Battle;

use EngineController;
use Database;
use PDO;

class IndexController extends EngineController
{
    function GET($request)
    {

        $sql = 'SELECT hero_battles.*, hero_a.name as name_a, hero_a.image as image_a, hero_b.name as name_b, hero_b.image as image_b FROM hero_battles 
                LEFT JOIN hero as hero_a ON hero_battles.hero_id_a = hero_a.id
                LEFT JOIN hero as hero_b ON hero_battles.hero_id_b = hero_b.id

                WHERE hero_battles.id = :id';


        $pdo = Database::getConnection()->pdo->prepare($sql);
        $pdo->bindParam('id', $request['1'], PDO::PARAM_INT);
        $pdo->execute();
        $data = $pdo->fetch();
        $metaTags = array('title' => $data['title'], 'description' => $data['description']);


        $userIP = ip2long($_SERVER['REMOTE_ADDR']);
        $sq = "SELECT vote_user.hero_battles_id FROM vote_user WHERE user_ip=:user_ip AND hero_battles_id=:battle_id AND DATE(created_at) = DATE(NOW())";
        $battleQuery = Database::getConnection()->pdo->prepare($sq);
        $battleQuery->bindParam('battle_id', $request[1], PDO::PARAM_INT);
        $battleQuery->bindParam('user_ip', $userIP, PDO::PARAM_STR);
        $battleQuery->execute();
        $is_voted = $battleQuery->fetch(PDO::FETCH_NUM);

        $battle1Id = false;
        $battle2Id = false;
        if ($is_voted) {
            $sql2 = "SELECT hb.id FROM hero_battles hb
                        LEFT OUTER JOIN vote_user vu ON (hb.id = vu.hero_battles_id AND user_ip=:user_ip AND DATE(created_at) = DATE(NOW()))
                WHERE
                  vu.id IS NULL
                  AND  (hb.hero_id_a=:hero1_id OR hb.hero_id_b=:hero1_id) LIMIT 1";
            $battle1Query = Database::getConnection()->pdo->prepare($sql2);
            $battle1Query->bindParam('hero1_id', $data['hero_id_a'], PDO::PARAM_INT);
            $battle1Query->bindParam('user_ip', $userIP, PDO::PARAM_INT);
            $battle1Query->execute();
            $battle1Id = $battle1Query->fetchColumn();

            $battle2Query = Database::getConnection()->pdo->prepare($sql2);
            $battle2Query->bindParam('hero1_id', $data['hero_id_b'], PDO::PARAM_INT);
            $battle2Query->bindParam('user_ip', $userIP, PDO::PARAM_INT);
            $battle2Query->execute();
            $battle2Id = $battle2Query->fetchColumn();
        }

        $commentsController = new Comments_BattleController();
        return $this->render(
            'Battle/index.php',
            array(
                'metaTags' => $metaTags,
                'vars' => $data,
                'is_voted' => $is_voted,
                'comments' => $commentsController->getCommentsPartial($request[1]),
                'battle1Id' => $battle1Id,
                'battle2Id' => $battle2Id
            )
        );
    }
}
