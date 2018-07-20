<?php 
class Update extends Conexao {

    public static function alterar_usuario( $coluna, $valor, $id ){

        $statement = self::$con->prepare("UPDATE USUARIO SET :coluna=:valor  WHERE ID = :id");
        $statement->bindParam(":coluna", $coluna);
        $statement->bindParam(":valor", $valor);
        $statement->bindParam(":id", $id);
        var_dump($statement);
        print_r($statement, true);
        $statement->execute();
        //$retorno = $statement->fetch(PDO::FETCH_ASSOC); 
        // var_dump($retorno);
        //return $retorno;
        //self::desconectar();
    }
}


?>