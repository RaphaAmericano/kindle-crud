<?php 
require_once 'insert.class.php';
require_once 'select.class.php';
class Conexao {

    protected static $con = null;

    public function __construct(){
        self::conectar();
        //die();
    }

    public static function conectar(){
        if(null == self::$con) {
            try{
                self::$con = new PDO("mysql:host=localhost;dbname=kindle", "root", "");
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