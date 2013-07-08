<?php
/**
 * Created by JetBrains PhpStorm.
 * User: oleg
 * Date: 7/22/12
 * Time: 3:35 PM
 *
 */
class Database
{
    const DB_HOST='localhost';
    const DB_NAME='hero_battle';
    const DB_USER='dota2best';
    const DB_PASSWORD='dota2best';
    /**
     * @var PDO $pdo
     */
    public $pdo;
    private static $database;

    private function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @static
     * @return Database
     */
    public static function getConnection()
    {
        if(!isset(self::$database)){
             self::$database = new Database();
        }
        return self::$database;

    }

}
