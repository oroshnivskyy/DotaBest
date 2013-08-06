<?php
namespace Page;

use EngineController;
use Database;
use PDO;

class IndexController extends EngineController
{
    const HERO_A = 0;
    const HERO_B = 1;

    protected $_bestHero;
    protected $_bestHeroScore;
    protected $_bestHeroesId;
    protected $_bestBattle;
    protected $_excludeBattlesId = array();
    protected $_bestBattles2lvl;


    function GET()
    {

        $metaTags = array(
            'title' => 'Всенародная голосовалка за героев Доты 2. Поднимы своего любимого героя к верхней позиции',
            'description' => 'Герои Доты 2 собраны в одном месте для того что б пользователи моглы написать про них отзывы а также занять первое место в турниной таблице сайта dota2best.com'
        );

        $this->loadBestHeroAndBattle();
        $bestHero = $this->getBestHero();
        $bestBattle = $this->getBestBattle();

        $heroesId = $this->getBestHeroesId();
        $this->_bestHeroesId = array();
        $bestBattles2lvl = $this->getBestPreviousBattles($heroesId);
        $heroesId = $this->getBestHeroesId();
        $bestBattles3lvl = $this->getBestPreviousBattles($heroesId);

        $bestHeroScore = $this->getBestHeroScore();
        return $this->render(
            'Page/index.php',
            array(
                'bestHero' => $bestHero,
                'bestBattle' => $bestBattle,
                'bestBattles2lvl' => $bestBattles2lvl,
                'bestBattles3lvl' => $bestBattles3lvl,
                'bestHeroScore' => $bestHeroScore,
                'metaTags' => $metaTags
            )
        );
    }

    public function getBestHero()
    {
        if (is_null($this->_bestHero)) {
            throw new Exception('Load best hero first');
        }
        return $this->_bestHero;
    }

    public function getBestHeroesId()
    {
        if (is_null($this->_bestHeroesId)) {
            throw new Exception('Load best hero first');
        }
        return $this->_bestHeroesId;
    }

    public function getBestBattle()
    {
        if (is_null($this->_bestBattle)) {
            throw new Exception('Load best match first');
        }
        return $this->_bestBattle;
    }

    public function getExcludeBattlesId()
    {
        if (is_null($this->_excludeBattlesId)) {
            throw new Exception('Load best match first');
        }
        return $this->_excludeBattlesId;
    }

    public function loadBestHeroAndBattle()
    {

        $sql = '
        (SELECT hero_battles.id AS battle_id, hero_battles.score_a,
            hero_battles.score_b, hero_battles.hero_id_a, hero_battles.hero_id_b,
            hero_a.name as name_a, hero_a.image as image_a, hero_b.name as name_b, hero_b.image as image_b
        FROM hero_battles
        LEFT JOIN hero as hero_a ON hero_battles.hero_id_a = hero_a.id
        LEFT JOIN hero as hero_b ON hero_battles.hero_id_b = hero_b.id
        ORDER BY score_a DESC LIMIT 1)
        UNION ALL
        (SELECT hero_battles.id AS battle_id, hero_battles.score_a,
            hero_battles.score_b, hero_battles.hero_id_a, hero_battles.hero_id_b,
            hero_a.name as name_a, hero_a.image as image_a, hero_b.name as name_b, hero_b.image as image_b
        FROM hero_battles
        LEFT JOIN hero as hero_a ON hero_battles.hero_id_a = hero_a.id
        LEFT JOIN hero as hero_b ON hero_battles.hero_id_b = hero_b.id
        ORDER BY score_b DESC LIMIT 1)';
        $pdo = Database::getConnection()->pdo->prepare($sql);
        $pdo->execute();

        $heroesInfo = $pdo->fetchAll();

        if ($heroesInfo[self::HERO_A]['score_a'] >= $heroesInfo[self::HERO_B]['score_b']) {
            $this->_bestBattle = $heroesInfo[self::HERO_A];
            $bestHero = array(
                'hero_id' => $heroesInfo[self::HERO_A]['hero_id_a'],
                'hero_image' => $heroesInfo[self::HERO_A]['image_a'],
                'hero_name' => $heroesInfo[self::HERO_A]['name_a']
            );
        } else {
            $this->_bestBattle = $heroesInfo[self::HERO_B];
            $bestHero = array(
                'hero_id' => $heroesInfo[self::HERO_B]['hero_id_b'],
                'hero_image' => $heroesInfo[self::HERO_B]['image_b'],
                'hero_name' => $heroesInfo[self::HERO_B]['name_b']
            );
        }

        $this->_excludeBattlesId[] = $heroesInfo[self::HERO_A]['battle_id'];
        $this->_excludeBattlesId[] = $heroesInfo[self::HERO_B]['battle_id'];
        $this->_bestHero = $bestHero;
        $this->_bestHeroesId[] = $this->_bestBattle['hero_id_a'];
        $this->_bestHeroesId[] = $this->_bestBattle['hero_id_b'];

        return;
    }

    public function getBestPreviousBattles($heroesId)
    {
        $excludeBattlesId = implode(',', $this->getExcludeBattlesId());
        $count = count($heroesId);
        for ($i = 0; $i < $count; $i++) {
            $battles[] = $this->getBestBattleFromPairs($this->getBestBattleForHero($heroesId[$i], $excludeBattlesId));
        }

        return $battles;
    }

    protected function getBestBattleForHero($heroId, $excludeBattlesId)
    {
        $sql = "
        (SELECT hero_battles.id AS battle_id, hero_battles.score_a,
            hero_battles.score_b, hero_battles.hero_id_a, hero_battles.hero_id_b,
            hero_a.name as name_a, hero_a.image as image_a, hero_b.name as name_b, hero_b.image as image_b
        FROM hero_battles
        LEFT JOIN hero as hero_a ON hero_battles.hero_id_a = hero_a.id
        LEFT JOIN hero as hero_b ON hero_battles.hero_id_b = hero_b.id
        WHERE (hero_id_a = :heroId) AND (hero_battles.id NOT IN ({$excludeBattlesId}))
        ORDER BY score_a DESC
        LIMIT 0,1 )
            UNION ALL
        (SELECT hero_battles.id AS battle_id, hero_battles.score_a,
            hero_battles.score_b, hero_battles.hero_id_a, hero_battles.hero_id_b,
            hero_a.name as name_a, hero_a.image as image_a, hero_b.name as name_b, hero_b.image as image_b
        FROM hero_battles
        LEFT JOIN hero as hero_a ON hero_battles.hero_id_a = hero_a.id
        LEFT JOIN hero as hero_b ON hero_battles.hero_id_b = hero_b.id
        WHERE (hero_id_b = :heroId) AND (hero_battles.id NOT IN ({$excludeBattlesId}))
        ORDER BY score_b DESC
        LIMIT 0,1 )
        ";
        $pdo = Database::getConnection()->pdo->prepare($sql);
        $pdo->bindParam('heroId', $heroId, PDO::PARAM_INT);
        $pdo->execute();
        $battlesInfo = $pdo->fetchAll();

        foreach ($battlesInfo as $battleI) {
            $this->_excludeBattlesId[] = $battleI['battle_id'];
        }

        return $battlesInfo;
    }

    protected function getBestBattleFromPairs($battlesInfo)
    {
        $resultBattle = array();
        if (count($battlesInfo) == 1) {
            $resultBattle = $battlesInfo[0]; // in any case it is array in array
        } else {
            if ($battlesInfo[self::HERO_A]['score_a'] > $battlesInfo[self::HERO_B]['score_b']) {
                $resultBattle = $battlesInfo[self::HERO_A];
            } else {
                $resultBattle = $battlesInfo[self::HERO_B];
            }
        }

        // add best opponents for further searches
        $this->_bestHeroesId[] = $resultBattle['hero_id_a'];
        $this->_bestHeroesId[] = $resultBattle['hero_id_b'];

        return $resultBattle;
    }

    protected function getBestHeroScore()
    {
        $bestHero = $this->getBestHero();
        $bestHeroId = $bestHero['hero_id'];

        $sql = '
        SELECT  score_a, score_b, hero_id_a, hero_id_b
        FROM hero_battles
        WHERE hero_id_a = :heroId OR hero_id_b = :heroId
        ';
        $pdo = Database::getConnection()->pdo->prepare($sql);
        $pdo->bindParam('heroId', $bestHeroId, PDO::PARAM_INT);
        $pdo->execute();

        $heroeScores = $pdo->fetchAll();
        $summaryScore = 0;
        foreach ($heroeScores as $score) {
            if ($score['hero_id_a'] == $bestHeroId) {
                $summaryScore += $score['score_a'];
            } else {
                $summaryScore += $score['score_b'];
            }
        }
        return $summaryScore;
    }

    public function var_export($var)
    {
        echo '<pre>';
        var_export($var);
        echo '</pre>';
        exit;
    }

}