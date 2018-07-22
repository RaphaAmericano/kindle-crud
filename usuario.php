<?php 
    include('header.php'); 
    include('backend/usuario.backend.php');
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="apagar">
    <input type="submit" value="apagar">
</form>


<h2>Agenda</h2>
<table>
    <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Data</th>
        <th>Editar</th>
    </tr>
    <?php if(!empty($agenda)):?>
    <?php foreach ($agenda as $key ): ?>   
    <?php if($key['USUARIO_ID'] == $retorno['ID']): ?>
    <tr>         
        <td><?php print $key['USUARIO_ID']; ?></td>
        <td><?php print $key['TITULO']; ?></td>
        <td><?php print $key['DESCRICAO']; ?></td>
        <td><time datetime="<?php print $key['DATA_']; ?>"><?php print $key['DATA_']; ?></time></td>
        <td><button class="btn_editar" value="<?php print $key["ID"]; ?>">Editar</button><button class="btn_apagar" value="<?php print $key["ID"]; ?>">Apagar</button></td>
    </tr>
    <?php endif; ?>
    <?php endforeach ?>
    <?php else: ?>
    <tr>
        <td colspan="3">Não há eventos</td>
    </tr>
    <?php endif; ?>
</table>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" style="display:none;" class="form_editar_evento">
    <h3>Editar Evento</h3>
    <label for="agenda_edita[nome]">Nome</label>
    <input type="text" name="agenda_edita[nome]">
    <label for="agenda_edita[descricao]">Dia</label>
    <input type="date" name="agenda_edita[dia]">
    <label for="agenda_edita[descricao]">Horário</label>
    <input type="time" name="agenda_edita[horario]">
    <label for="agenda_edita[descricao]">Descricão</label>
    <textarea name="agenda_edita[descricao]"></textarea>
    <input type="submit" value="Editar">
    <input type="hidden" name="agenda_edita[id_usuario]" value="<?php echo $retorno['ID']; ?>">
    <input type="hidden" name="agenda_edita[id]" value="0">
</form>
<h3>Novo Evento</h3>
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
<script src="js/script.js"></script>
</body>
</html>