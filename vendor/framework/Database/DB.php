<?php

namespace vendor\framework\Database;

class DB extends Builder {
    protected static $connect;
    protected static $instance;
    public static $queries = [];

    public function __construct(){
        self::$connect = new \mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_NAME'));
        if(self::$connect->connect_error){
            die("Failed to connection database: " . self::$connect->connect_error);
        }
    }

    public static function instance(){
        if(self::$instance == null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    // После построение запроса query уже делает запрос к бд
    public static function query($query){
        return self::$connect->query($query);
    }

    // Получает имя бд и создает обьект Builder для конструкции запроса
    public static function table($table_name){
        $builder = new Builder();
        $builder->sql .= "SELECT * FROM `$table_name`";
        return $builder;
    }

//    public function all($table_name){
//        $sql = "SELECT * FROM `$table_name`";
//        return self::query($sql);
//    }
}