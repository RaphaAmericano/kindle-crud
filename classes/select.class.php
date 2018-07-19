<?php 

class Select extends Conexao {

    public static function selecionar_usuario( $id ){
        $statement = self::$con->prepare("SELECT * FROM USUARIO WHERE ID = :id)");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $retorno = $statement->fetchAll(PDO::FETCH_ASSOC); 
        return $retorno;
        //self::desconectar();
    }

    public static function selecionar_todos(){
        $statement = self::$con->prepare("SELECT * FROM USUARIO");
        $statement->execute();
        $retorno = $statement->fetchAll(PDO::FETCH_ASSOC); 
        return $retorno;
    }   
}

?>