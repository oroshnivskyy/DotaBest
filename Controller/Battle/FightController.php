<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 7/23/12
 * Time: 11:16 AM
 *
 */

class Battle_FightController extends EngineController
{
    function GET($request)
    {

        $battle_id = $request[1];
        $hero_letter = 'b';
        if ($request[2] == 0) {
            $hero_letter = 'a';
        }
        $userIP = ip2long($_SERVER['REMOTE_ADDR']);
        $sq = "SELECT vote_user.hero_battles_id FROM vote_user WHERE user_ip=:user_ip AND hero_battles_id=:battle_id AND DATE(created_at) = DATE(NOW())";
        $battleQuery = Database::getConnection()->pdo->prepare($sq);
        $battleQuery->bindParam('battle_id', $battle_id, PDO::PARAM_INT);
        $battleQuery->bindParam('user_ip', $userIP, PDO::PARAM_STR);
        $battleQuery->execute();
        $is_battle=$battleQuery->fetch(PDO::FETCH_NUM);
        if (!$is_battle) {
            $sql = "UPDATE hero_battles SET score_{$hero_letter}=score_{$hero_letter}+1 WHERE id=:id";
            $pdo = Database::getConnection()->pdo->prepare($sql);
            $pdo->bindParam('id', $battle_id, PDO::PARAM_INT);
            if ($pdo->execute()) {
                $sql1 = "SELECT hero_id_{$hero_letter} FROM hero_battles where hero_battles.id=:id";
                $winnerIdQuery = Database::getConnection()->pdo->prepare($sql1);
                $winnerIdQuery->bindParam('id', $battle_id, PDO::PARAM_INT);
                $winnerIdQuery->execute();
                $winner_id = $winnerIdQuery->fetch(PDO::FETCH_COLUMN);

                $voteSql = "INSERT vote_user (hero_battles_id, hero_id, user_ip) VALUES (:battle_id, :hero_id, :user_ip)";
                $pdo = Database::getConnection()->pdo->prepare($voteSql);
                $pdo->execute(array('battle_id' => $battle_id, 'hero_id' => $winner_id, 'user_ip' => $userIP));

//                $sql2 = "SELECT hero_battles.id FROM hero_battles
//                WHERE
//                  hero_battles.id NOT IN(SELECT vote_user.hero_battles_id FROM vote_user WHERE user_ip=:user_ip)
//                  AND ( hero_battles.hero_id_a = :winner_id OR hero_battles.hero_id_b = :winner_id ) LIMIT 1";
//                $battleQuery = Database::getConnection()->pdo->prepare($sql2);
//                $battleQuery->bindParam('winner_id', $winner_id, PDO::PARAM_INT);
//                $battleQuery->bindParam('user_ip', $userIP, PDO::PARAM_STR);
//                $battleQuery->execute();
//                $next_battle = $battleQuery->fetch(PDO::FETCH_COLUMN);
//                if ($next_battle) {
//                    $this->redirect('/battle/'.$battle_id.'/' . $next_battle);
//                }
                $this->redirect('/battle/' . $battle_id);
            } else {
                $this->redirect('/battle/' . $battle_id);
            }
        }
        $this->redirect('/battle/' . $battle_id);
    }

}
