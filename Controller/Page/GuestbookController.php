<?php
namespace Page;

use EngineController;
use Database;
use PDO;

class GuestbookController extends EngineController
{
    function GET()
    {
        return $this->render(
            'Page/guestbook.php',
            array(
                'comments' => $this->getComments(),
                'metaTags' => array(
                    'title' => 'Гостевая книга',
                    'description' => 'Оставь свой коментарий. Что ты хочешь увидеть на етом сайте?',
                    'active_tab' => 'guest_book'
                )
            )
        );
    }

    function POST()
    {
        $text = $_POST['text'];
        $ip = ip2long($_SERVER['REMOTE_ADDR']);
        $email = $_POST['email'];

        if (empty($text) || !filter_var($email, FILTER_VALIDATE_EMAIL)
        ) {
            return $this->render(
                'Page/guestbook.php',
                array(
                    'comments' => $this->getComments(),
                    'text' => $text,
                    'has_errors' => true
                )
            );
        }

        $STH = Database::getConnection()->pdo->prepare(
            '
                          INSERT INTO guest_comments ( text, user_ip,email) values (?,?,?)
                        '
        );
        $STH->execute(array($text, $ip, $email));

        self::redirect('/guestbook');
    }

    private static function getComments()
    {
        $STH = Database::getConnection()->pdo->prepare(
            '
                            SELECT * FROM guest_comments'
        );
        $STH->execute();

        return $STH->fetchAll(PDO::FETCH_OBJ);
    }
}