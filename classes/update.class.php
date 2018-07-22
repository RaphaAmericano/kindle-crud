<?php 
class Update extends Conexao {

    public static function alterar_usuario( $coluna, $valor, $id ){
        switch ($coluna) {
            case 'NOME':
                $sql = "UPDATE USUARIO SET NOME=:valor  WHERE ID = :id";
                break;
            case 'EMAIL':
                $sql = "UPDATE USUARIO SET EMAIL=:valor  WHERE ID = :id";
                break;
            case 'TELEFONE':
                $sql = "UPDATE USUARIO SET TELEFONE=:valor  WHERE ID = :id";
                break;
            case 'DESCRICAO':
                $sql = "UPDATE USUARIO SET DESCRICAO=:valor  WHERE ID = :id";
                break;
            default:
                $sql = "UPDATE USUARIO SET NOME=:valor  WHERE ID = :id";
                break;
        }
        $statement = self::$con->prepare($sql);
        $statement->bindParam(":valor", $valor);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public static function alterar_evento( $coluna, $valor, $id ){
        switch ($coluna) {
            case 'DESCRICAO':
                $sql = "UPDATE AGENDA SET DESCRICAO=:valor  WHERE ID = :id";
                break;
            case 'TITULO':
                $sql = "UPDATE AGENDA SET TITULO=:valor  WHERE ID = :id";
                break;
            case 'DATA_':
                $sql = "UPDATE AGENDA SET DATA_=:valor  WHERE ID = :id";
                break;
            default:
                $sql = "UPDATE AGENDA SET TITULO=:valor  WHERE ID = :id";
                break;
        }
        $statement = self::$con->prepare($sql);
        $statement->bindParam(":valor", $valor);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}


?>