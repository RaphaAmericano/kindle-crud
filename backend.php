<?php 
require_once 'classes/conexao.class.php';

if( isset($_POST['novo'])){

    $values = array(
    'nome' => $_POST['novo']['nome'],
    'email' => $_POST['novo']['email'],
    'telefone' => $_POST['novo']['telefone'],
    'descricao' => $_POST['novo']['descricao']
    );
    $banco = new Insert();
    $banco->inserir_usuario($values['nome'], $values['email'], $values['telefone'], $values['descricao']);
}
?>