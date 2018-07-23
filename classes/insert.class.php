<?php 
class Insert extends Conexao {
    
    public static function inserir_usuario( $usuario, $email, $telefone, $descricao){
        $usuario = parent::verifica_nome($usuario);
        $email = parent::verifica_email($email);
        $telefone = parent::verifica_telefone($telefone);
        $descricao = parent::verifica_descricao($descricao);
        
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
        $data_evento = parent::verifica_data($data_evento);
        $descricao = parent::verifica_descricao($descricao);
        $titulo =  parent::verifica_nome($titulo);

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