<?php
namespace App\Database;

class Database{
    public $connection;
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = '';
    private $DB_NAME = 'cash_manager';

    public function __construct(){
        $this->open_db_connection();
    }


    public function open_db_connection(){

        date_default_timezone_set("Asia/Dhaka");

        try{
            $this->connection = new \PDO("mysql:dbname={$this->DB_NAME};host={$this->DB_HOST}","{$this->DB_USER}","{$this->DB_PASS}");
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);

        }
        catch(\PDOException $e){
            echo "Connection Failed ". $e->getMessage();
        }
    }

    public function last_insert_id(){
        return last_insert_id($this->connection);
    }
}

$db = new Database();