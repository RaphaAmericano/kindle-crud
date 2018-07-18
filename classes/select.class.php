<?php 

class Select extends Conexao {

    public static function selecionar_usuario( $id ){
        $statement = $banco->prepare("SELECT FROM USUARIO WHERE ID_USUARIO = :id)");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $banco->desconectar();
    }

    public static function selecionar_todos(){
        $statement = $banco->prepare("SELECT * FROM USUARIO");
        $statement->execute();
        $retorno = $statement->fetchAll(PDO::FETCH_ASSOC); 
        return $retorno;
    }   
}

?>