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
    //Verificações
    public static function verifica_nome($valor){
        if(!empty($valor)){
            $valor = trim($valor);
            return $valor;
        }
        return false;
    }

    public static function verifica_email($valor){
        $valor = trim($valor);
        if(filter_var($valor, FILTER_VALIDATE_EMAIL)){
            return $valor;
        }
        return false;
    }

    public static function verifica_telefone($valor){
        $valor = trim($valor);
        if( is_numeric($valor) && (strlen($valor) == 10 || strlen($valor) == 11)){
            return $valor;
        }
        return false;
    }

    public static function verifica_descricao($valor){
        if(!empty($valor)){
            $valor = trim($valor);
            return $valor;
        }
        return false;
    }

    public static function verifica_data($valor){
        if(!empty($valor) && strlen($valor) == 19 ){
            $valor = trim($valor);
            return $valor;
        }
        return false;
    }
}







?>