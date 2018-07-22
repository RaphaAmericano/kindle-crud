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
    public function verifica_nome($valor){
        if(!empty($valor)){
            $valor = trim($valor);
            return $valor;
        }
        return false;
    }

    public function verifica_email($valor){
        $valor = trim($valor);
        if(filter_var($valor, FILTER_VALIDATE_EMAIL)){
            return $valor;
        }
        return false;
    }

    public function verifica_telefone($valor){
        $valor = trim($valor);
        if($valor == 10 || $valor == 11){

        }
        return;
    }

    public function verifica_descricao(){
        return;
    }
}







?>