<?php
namespace Comments;

use EngineController;
use Database;
use PDO;

class DoterController extends EngineController
{
    const TYPE_BATTLE = 1;
    const TYPE_HERO = 2;
    const TYPE_some = 3;
    const TYPE_DOTER = 4;

    function getCommentsPartial($doter_id)
    {
        return $this->renderPartial(
            'Comments/doter/commentsList.php',
            array(
                'comments' => self::getComments($doter_id, Comments_DoterController::TYPE_DOTER),
                'owner_id' => $doter_id
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
                'Comments/doter/commentsList.php',
                array(
                    'comments' => $this->getComments($owner_id, Comments_DoterController::TYPE_DOTER),
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
        $STH->execute(array($owner_id, Comments_DoterController::TYPE_DOTER, $user_name, $text, time(), $ip));

        self::redirect('/player/' . $owner_id);
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
