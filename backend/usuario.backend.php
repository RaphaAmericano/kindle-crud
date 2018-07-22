<?php 
$banco = new Select();

if(isset($_POST['usuarios'])){
    $usuario = $_POST['usuarios'];
    $retorno = $banco->selecionar_usuario($usuario);
    $agenda = $banco->selecionar_eventos($usuario);
} 

if(isset($_POST['edita'])){ 
    $banco_update = new Update();
    if(!empty($_POST['edita']['nome'])){
        $banco_update->alterar_usuario('NOME', $_POST['edita']['nome'], $_POST['edita']['id']);
    };
    if(!empty($_POST['edita']['email'])){
        $banco_update->alterar_usuario('EMAIL', $_POST['edita']['email'], $_POST['edita']['id']);
    };
    if(!empty($_POST['edita']['telefone'])){
        $banco_update->alterar_usuario('TELEFONE', $_POST['edita']['telefone'], $_POST['edita']['id']);
    };
    if(!empty($_POST['edita']['descricao'])){
        $banco_update->alterar_usuario('DESCRICAO', $_POST['edita']['descricao'], $_POST['edita']['id']);
    };
    $retorno = $banco->selecionar_usuario($_POST['edita']['id']);
}

if(isset($_POST['agenda'])){
    $insert_agenda = new Insert();
    $evento = $insert_agenda->inserir_evento($_POST['agenda']['id'], $_POST['agenda']['descricao'], $_POST['agenda']['nome'], $_POST['agenda']['dia'],$_POST['agenda']['horario']);
    $retorno = $banco->selecionar_usuario($_POST['agenda']['id']);
    $agenda = $banco->selecionar_eventos($_POST['agenda']['id']);
}

if(isset($_POST['agenda_edita'])){
    
    $edita_agenda = new Update();
    if(!empty($_POST['agenda_edita']['nome'])){
        $edita_agenda->alterar_evento('TITULO', $_POST['agenda_edita']['nome'], $_POST['agenda_edita']['id']);
    };
    if(!empty($_POST['agenda_edita']['dia']) &&  !empty($_POST['agenda_edita']['horario'])){
        $data_evento = $_POST['agenda_edita']['dia'].' '.$_POST['agenda_edita']['horario'].':00';
        $edita_agenda->alterar_evento('DATA_', $data_evento, $_POST['agenda_edita']['id']);
    };
    if(!empty($_POST['agenda_edita']['descricao'])){
        $edita_agenda->alterar_evento('DESCRICAO', $_POST['agenda_edita']['descricao'], $_POST['agenda_edita']['id']);
    };
    $retorno = $banco->selecionar_usuario($_POST['agenda_edita']['id_usuario']);
    $agenda = $banco->selecionar_eventos($_POST['agenda_edita']['id_usuario']);
}

?>