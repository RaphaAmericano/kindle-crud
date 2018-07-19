<?php 
class Insert extends Conexao {


    public static function inserir_usuario( $usuario, $email, $telefone, $descricao){
     
        $sql = "INSERT INTO USUARIO (NOME, EMAIL, TELEFONE, DESCRICAO) VALUES ( :nome, :email, :telefone, :descricao)";
        $statement = self::$con->prepare($sql);
        $statement->bindParam(':nome', $usuario, PDO::PARAM_STR);
        $statement->bindParam(':email', $email,PDO::PARAM_STR);
        $statement->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $statement->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $exec = $statement->execute();
        return $exec;
    }

}

?>