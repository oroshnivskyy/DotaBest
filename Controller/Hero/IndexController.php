<?php

/**
 * This is controller
 * @author Klosovych Oleksandr
 * @package
 */;
class Hero_IndexController extends EngineController{
    static $hero_id;
    function GET($request) {
        $hero_id=$request[1];
        self::$hero_id=$hero_id;
        $sql = 'SELECT * FROM hero
                WHERE hero.id = '.(int)$hero_id.' ';

        $hero= Database::getConnection()->pdo->query($sql)->fetch();

        Database::getConnection()->pdo->prepare('UPDATE hero_pattles SET WHERE ');
        $sqlBatt = 'SELECT hero_battles.*, hero_a.name as name_a, hero_a.image as image_a, hero_b.name as name_b, hero_b.image as image_b FROM hero_battles
                    LEFT JOIN hero as hero_a ON hero_battles.hero_id_a = hero_a.id
                    LEFT JOIN hero as hero_b ON hero_battles.hero_id_b = hero_b.id

                    WHERE ( hero_battles.hero_id_a = '.(int)$hero_id.' OR hero_battles.hero_id_b = '.(int)$hero_id.' )';
        $battles = Database::getConnection()->pdo->query($sqlBatt)->fetchAll();

        $metaTags = array('title'=>$hero['name'],'description'=>$hero['description'],'active_tab'=>'hero_list');



        usort($battles, array('Hero_IndexController',"cmp"));

        return $this->render('Hero/index.php',array('metaTags'=>$metaTags,'vars'=>$hero, 'battles'=> $battles));
    }
    static function cmp($a, $b)
    {
            if(self::$hero_id != $a['hero_id_a']){
                $t=$a['score_a'];
                $a['score_a']=$a['score_b'];
                $a['score_b']=$t;
            }
        if(self::$hero_id != $b['hero_id_a']){
            $t=$b['score_a'];
            $b['score_a']=$b['score_b'];
            $b['score_b']=$t;
        }

        if ($a['score_a'] == $b['score_a']) {
                return 0;
            }
            return ($a['score_a'] < $b['score_a']) ? 1 : -1;
        }
}