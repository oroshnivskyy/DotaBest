<?php
namespace Comments;

use EngineController;
use Database;
use PDO;

class BattleController extends EngineController
{
    const TYPE_BATTLE = 1;
    const TYPE_HERO = 2;
    const TYPE_some = 3;

    function getCommentsPartial($battle_id)
    {
        return $this->renderPartial(
            'Comments/battle/commentsList.php',
            array(
                'comments' => self::getComments($battle_id, static::TYPE_BATTLE),
                'owner_id' => $battle_id
            )
        );
    }


    function POST()
    {
        $owner_id = $_POST['owner_id'];
        $user_name = ($_POST['user_name']);
        $text = $_POST['text'];
        $ip = ip2long($_SERVER['REMOTE_ADDR']);

        if (!filter_var($owner_id, FILTER_VALIDATE_INT)
            || empty($user_name)
            || empty($text)
        ) {
            return $this->render(
                'Comments/battle/commentsList.php',
                array(
                    'comments' => $this->getComments($owner_id, Comments_BattleController::TYPE_BATTLE),
                    'owner_id' => $owner_id,
                    'user_name' => $user_name,
                    'text' => $text,
                    'has_errors' => true
                )
            );
        }

        $STH = Database::getConnection()->pdo->prepare(
            '
                          INSERT INTO comments (owner_id, type, nick, text, created_at, user_ip) values (?, ?, ?, ?, ?, ?)
                        '
        );
        $STH->execute(array($owner_id, self::TYPE_BATTLE, $user_name, $text, time(), $ip));

        self::redirect('/battle/' . $owner_id);
    }


    private static function getComments($owner_id, $type)
    {
        $STH = Database::getConnection()->pdo->prepare(
            '
                            SELECT * FROM comments WHERE (owner_id = ? AND type = ?)
                        '
        );
        $STH->execute(array($owner_id, $type));

        return $STH->fetchAll(PDO::FETCH_OBJ);
    }
}