<?php 

if( isset($_POST['novo'])){

    $values = array(
    'nome' => $_POST['novo']['nome'],
    'email' => $_POST['novo']['email'],
    'telefone' => $_POST['novo']['telefone'],
    'descricao' => $_POST['novo']['descricao']
    );
    $banco = new Insert();
    
    $banco->inserir_usuario($values['nome'], $values['email'], $values['telefone'], $values['descricao']);
    header("HTTP/1.1 301 Moved Moved Permanently");
    header("Location: index.php");
    die();
}

if( isset($_POST['apagar'])){
    $banco = new Delete();
    $banco->deletar_usuario($_POST['apagar']['id']);
    header("HTTP/1.1 301 Moved Moved Permanently");
    header("Location: index.php");
    die();  
}


?>