<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 7/25/12
 * Time: 9:34 PM
 *
 */
class Doter_PlayerController extends EngineController
{
    function GET($request){
        $uq=Database::getConnection()->pdo->prepare('SELECT * FROM user WHERE id=:id');
        $uq->execute(array('id'=>$request['id']));
        $doter=$uq->fetch();
        if(!$doter){
            $this->redirect('/best');
        }
        $userIP = ip2long($_SERVER['REMOTE_ADDR']);
        $sq = "SELECT id FROM vote_doter WHERE user_ip=:user_ip AND user_id=:user_id AND DATE(created_at) = DATE(NOW())";
        $hadVoteQuery = Database::getConnection()->pdo->prepare($sq);
        $hadVoteQuery->bindParam('user_id', $request['id'], PDO::PARAM_INT);
        $hadVoteQuery->bindParam('user_ip', $userIP, PDO::PARAM_STR);
        $hadVoteQuery->execute();
        $has_voted=$hadVoteQuery->fetch(PDO::FETCH_NUM);
        $commentsController=new Comments_DoterController();
        return $this->render('Doter/player.php',array('doter'=>$doter,
            'comments'=>$commentsController->getCommentsPartial($request['id']),
            'has_voted' => $has_voted,'metaTags'=>array('title'=>$doter['name'],'description'=>$doter['name'].' один из лучших игроков в Dota2.','active_tab'=>'doter_list')
        ));
    }
}
