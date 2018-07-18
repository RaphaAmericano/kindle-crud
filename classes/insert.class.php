<?php 
class Insert extends Conexao {



    public static function inserir_usuario( $usuario, $email, $telefone, $descricao){
        $statement = $banco->prepare("INSERT INTO USUARIO(NOME, EMAIL, TELEFONE) VALUES(:nome,:email,:telefone, :descricao)");
        $statement->bindValue(":nome", $usuario);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":telefone", $telefone);
        $statement->bindValue(":descricao", $descricao);
        $statement->execute();
        $banco->desconectar();
    }

}

?>