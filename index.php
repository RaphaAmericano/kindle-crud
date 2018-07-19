<?php include('header.php'); ?>
<body>

<h2>Cadastrar Usuario</h2>
<form action="backend.php" method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="novo[nome]">
    <label for="email">Email</label>
    <input type="email" name="novo[email]">
    <label for="telefone">Telefone</label>
    <input type="tel" name="novo[telefone]">
    <label for="descricao">Descrição</label>
    <textarea name="novo[descricao]" ></textarea>
    <input type="submit" value="enviar">
</form>

<h2>Lista de Usuarios</h2>

<?php 
$usuarios = new Select();
$linhas = $usuarios->selecionar_todos();

if(!empty($linhas)): ?>
<form action="usuario.php" method="post">
    <select name="usuarios">
    <?php foreach ($linhas as $chave) {
        print '<option value="'.$chave['ID'].'">'.$chave['NOME'].'</option>';
    } ?>
    </select>
    <input type="submit" value="selecionar">
</form>
<?php else: ?>
<h3>Não há usuários</h3>
<?php endif; ?>
</body>
</html>


