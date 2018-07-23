<?php 
class Update extends Conexao {

    public static function alterar_usuario( $coluna, $valor, $id ){
        switch ($coluna) {
            case 'NOME':
                $valor = parent::verifica_nome($valor);
                $sql = "UPDATE USUARIO SET NOME=:valor  WHERE ID = :id";
                break;
            case 'EMAIL':
                $valor = parent::verifica_email($valor);
                $sql = "UPDATE USUARIO SET EMAIL=:valor  WHERE ID = :id";
                break;
            case 'TELEFONE':
                $valor = parent::verifica_telefone($valor);
                $sql = "UPDATE USUARIO SET TELEFONE=:valor  WHERE ID = :id";
                break;
            case 'DESCRICAO':
                $valor = parent::verifica_descricao($valor);
                $sql = "UPDATE USUARIO SET DESCRICAO=:valor  WHERE ID = :id";
                break;
            default:
                $valor = parent::verifica_nome($valor);
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
                $valor = parent::verifica_descricao($valor);
                $sql = "UPDATE AGENDA SET DESCRICAO=:valor  WHERE ID = :id";
                break;
            case 'TITULO':
                $valor = parent::verifica_nome($valor);
                $sql = "UPDATE AGENDA SET TITULO=:valor  WHERE ID = :id";
                break;
            case 'DATA_':
                $valor = parent::verifica_data($valor);
                $sql = "UPDATE AGENDA SET DATA_=:valor  WHERE ID = :id";
                break;
            default:
                $valor = parent::verifica_nome($valor);
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