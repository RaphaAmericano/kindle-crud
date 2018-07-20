<?php 
require_once 'insert.class.php';
require_once 'select.class.php';
require_once 'update.class.php';
require_once 'delete.class.php';
class Conexao {

    protected static $con = null;

    public function __construct(){
        self::conectar();
        //die();
    }

    public static function conectar(){
        if(null == self::$con) {
            try{
                self::$con = new PDO("mysql:host=localhost;dbname=kindle;charset=utf8;", "root", "");
            }catch(PDOException $e){
                die($e->getCode());
            }
            return self::$con;
        }
    }

    public static function desconectar(){
        self::$con = null;
    }

}







?>