<?php include('header.php'); 
$banco = new Select();

if(isset($_GET['usuarios'])){
    $usuario = $_GET['usuarios'];
    $retorno = $banco->selecionar_usuario($usuario);
    $agenda = $banco->selecionar_eventos($usuario);
} 

if(isset($_POST['edita'])){ 
    var_dump($_POST['edita']);
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

?>

<h2>Usuario</h2>
<table>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td><?php echo $retorno['NOME'] ?></td>
        <td><?php echo $retorno['EMAIL'] ?></td>
        <td><?php echo $retorno['TELEFONE'] ?></td>
        <td><?php echo $retorno['DESCRICAO'] ?></td>
    </tr>
    <tr>
        <th colspan="4">Editar</th>
    </tr>
    <tr>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">    
            <td><input placeholder="<?php echo $retorno['NOME'] ?>" type="text" name="edita[nome]"></td>
            <td><input placeholder="<?php echo $retorno['EMAIL'] ?>" type="text" name="edita[email]"></td>
            <td><input placeholder="<?php echo $retorno['TELEFONE'] ?>" type="text" name="edita[telefone]"></td>
            <td><input placeholder="<?php echo $retorno['DESCRICAO'] ?>" type="text" name="edita[descricao]"></td>
            <td><input type="submit" value="Atualizar"></td>
            <input type="hidden" name="edita[id]" value="<?php echo $retorno['ID']; ?>">
        </form>
    </tr>
</table>

<h2>Agenda</h2>
<table>
    <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Data</th>
    </tr>
    <?php if(!empty($agenda)):?>

    <?php else: ?>
    <tr>
        <td colspan="3">Não há eventos</td>
    </tr>
    <?php endif; ?>
</table>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="agenda[nome]">Nome</label>
    <input type="text" name="agenda[nome]">
    <label for="agenda[descricao]">Dia</label>
    <input type="date" name="agenda[dia]">
    <label for="agenda[descricao]">Horário</label>
    <input type="time" name="agenda[horario]">
    <label for="agenda[descricao]">Descricão</label>
    <textarea name="agenda[descricao]"></textarea>
    <input type="submit" value="Novo">
    <input type="hidden" name="agenda[id]" value="<?php echo $retorno['ID']; ?>">
</form>
