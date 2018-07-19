<?php 
class Insert extends Conexao {


    public static function inserir_usuario( $usuario, $email, $telefone, $descricao){
        $sql = "INSERT INTO USUARIO (NOME, EMAIL, TELEFONE) VALUES ( :nome, :email, :telefone, :descricao)";
        $statement = self::$con->prepare($sql);
        $statement->bindParam(":nome", $usuario);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":telefone", $telefone);
        $statement->bindParam(":descricao", $descricao);
        $statement->execute();
        // $statement->execute(array(
        //     ':nome' => $usuario,
        //     ':email' => $email,
        //     ':telefone' => $telefone,
        //     ':descricao' => $descricao
        // ));
        print_r($statement, true);
        //parent::desconectar();
    }

}

?>