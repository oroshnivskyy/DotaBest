<?php
namespace Admin;

use EngineController;
use Database;
use PDO;

class CreatebattlesController extends EngineController
{
    function GET()
    {

        //array heros
        $vars = Database::getConnection()->pdo->query('SELECT * FROM hero WHERE 1')->fetchAll();
        //Уже записаны в БД
        $inBd = array();
        $i = 0;
        $j = 0;
        $sqlInsert = '';
        $statusIsert = false;
        foreach ($vars as $item) {
            foreach ($vars as $hero) {
                if ($item['id'] == $hero['id']) {
                    continue;
                }

                $isset = false;
                if (in_array($hero['id'] . '-' . $item['id'], $inBd)) {
                    echo 1;
                    continue;
                }

                $hero_a = $item['name'];
                $hero_b = $hero['name'];
                $hero_id_a = $item['id'];
                $hero_id_b = $hero['id'];
                $score_a = rand(0, 200);
                $score_b = rand(0, 200);
                $title = 'Соревнование между ' . $hero_a . ' и ' . $hero_b . ' героями Доты 2';
                $description = '' . $hero_a . ' и ' . $hero_b . ' принимают участие в эпическом сражении между собой. Голосуй за твоего любимого героя';
                $time = time();

                $sqlInsert .= "({$hero_id_a}, 
                                {$hero_id_b}, 
                                {$score_a},
                                {$score_b},
                                '{$title}',
                                '{$description}',
                                {$time}),";
                $inBd[] = $item['id'] . '-' . $hero['id'];
                $statusIsert = true;

                $j++;
            }
            $i++;
        }
        try {
            Database::getConnection()->pdo->prepare(
                "INSERT INTO hero_battles
                                                                                        (hero_id_a, hero_id_b, score_a,
                                                                                        score_b, title, description, last_updated_at) values 
                                                                                        " . mb_substr($sqlInsert, 0, -1, 'utf8') . " "
            )->execute();
            //                        var_dump($sqlInsert);
        } catch (PDOException $e) {
            echo $e->getMessage();

        }
        echo 'True';
    }
}
