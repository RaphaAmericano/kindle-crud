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

    public static function inserir_evento( $usuario, $descricao, $titulo, $dia, $horario){
        $data_evento = $dia.' '.$horario.':00';
        $sql = "INSERT INTO AGENDA (USUARIO_ID, DESCRICAO, TITULO, DATA_) VALUES ( :id_usuario, :descricao, :titulo, :data_)";
        $statement = self::$con->prepare($sql);
        $statement->bindParam(':id_usuario', $usuario);
        $statement->bindParam(':descricao', $descricao);
        $statement->bindParam(':titulo', $titulo);
        $statement->bindParam(':data_', $data_evento);
        $exec = $statement->execute();
        return $exec;
    }
}

?>