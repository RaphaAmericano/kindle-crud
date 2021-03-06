<?php 

class Select extends Conexao {

    public static function selecionar_usuario( $id ){
        $statement = self::$con->prepare("SELECT * FROM USUARIO WHERE ID = :id LIMIT 1");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $retorno = $statement->fetch(); 
        return $retorno;
        //self::desconectar();
    }

    public static function selecionar_todos(){
        $statement = self::$con->prepare("SELECT * FROM USUARIO");
        $statement->execute();
        $retorno = $statement->fetchAll(PDO::FETCH_ASSOC); 
        return $retorno;
    }
    
    public static function selecionar_eventos($id){
        
        $statement = self::$con->prepare("SELECT * FROM USUARIO INNER JOIN AGENDA ON USUARIO.ID=AGENDA.USUARIO_ID");
       
        $statement->execute();
        $retorno = $statement->fetchAll(); 
        
        return $retorno;
    }

}

?>