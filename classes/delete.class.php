<?php 
class Delete extends Conexao {
    public static function deletar_usuario( $id ){
        $sql = "DELETE * FROM USUARIO WHERE ID = :id";
        $statement = self::$con->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public static function deletar_evento( $id ){
        $sql = "DELETE * FROM AGENDA WHERE ID = :id";
        $statement = self::$con->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}
?>