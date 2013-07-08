<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 7/25/12
 * Time: 9:59 PM
 *
 */
class Doter_VoteController extends EngineController
{
    function GET($request){
        $doter_id=$request['id'];

        $isUserQuery = Database::getConnection()->pdo->prepare('SELECT team_id FROM user WHERE id=:user_id');
        $isUserQuery->bindParam('user_id', $doter_id, PDO::PARAM_INT);
        $isUserQuery->execute();
        $user_team=$isUserQuery->fetch();
        if(!$user_team){
            $this->redirect('/best');
        }

        $userIP = ip2long($_SERVER['REMOTE_ADDR']);
        $sq = "SELECT id FROM vote_doter WHERE user_ip=:user_ip AND user_id=:user_id AND DATE(created_at) = DATE(NOW())";
        $hadVoteQuery = Database::getConnection()->pdo->prepare($sq);
        $hadVoteQuery->bindParam('user_id', $doter_id, PDO::PARAM_INT);
        $hadVoteQuery->bindParam('user_ip', $userIP, PDO::PARAM_STR);
        $hadVoteQuery->execute();
        $has_voted=$hadVoteQuery->fetch(PDO::FETCH_NUM);

        if(!$has_voted){
            $sql = "UPDATE user SET score=score+1 WHERE id=:id";
            $pdo = Database::getConnection()->pdo->prepare($sql);
            $pdo->bindParam('id', $doter_id, PDO::PARAM_INT);
            if ($pdo->execute()) {

                $sql = "UPDATE team SET score=score+1 WHERE id=:id";
                $pdo = Database::getConnection()->pdo->prepare($sql);
                $pdo->bindParam('id', $user_team['team_id'], PDO::PARAM_INT);
                $pdo->execute();
                $voteSql = "INSERT vote_doter ( user_id, user_ip) VALUES (:user_id, :user_ip)";
                $pdo = Database::getConnection()->pdo->prepare($voteSql);
                $pdo->execute(array( 'user_id' => $doter_id, 'user_ip' => $userIP));
                $this->redirect('/player/'.$doter_id);
            }
        }else{
            $this->redirect('/player/'.$doter_id);
        }
    }
}
