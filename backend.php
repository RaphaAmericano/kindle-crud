<?php 
require_once 'classes/conexao.class.php';

if( isset($_POST['novo'])){

    $values = array(
    'nome' => $_POST['usuario']['nome'],
    'email' => $_POST['usuario']['email'],
    'telefone' => $_POST['usuario']['telefone'],
    'descricao' => $_POST['usuario']['descricao']
    );
    $banco = new Insert();
    $banco->inserir_usuario($values['nome'], $values['email'], $values['telefone'], $values['descricao']);
}
?>