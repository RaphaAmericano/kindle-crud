<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>
    <?php require_once 'classes/conexao.class.php'; ?>
</head>
<body>

<h2>Cadastrar Usuario</h2>
<form action="backend.php" method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="usuario[nome]">
    <label for="email">Email</label>
    <input type="email" name="usuario[email]">
    <label for="telefone">Telefone</label>
    <input type="tel" name="usuario[telefone]">
    <label for="descricao">Descrição</label>
    <textarea name="usuario[descricao]" ></textarea>
    <input type="submit" value="enviar">
</form>

<h2>Lista de Usuarios</h2>

<?php 
$usuarios = new Select();
$linhas = $usuarios->selecionar_todos();

if(!empty($linhas)): ?>
<select name="usuarios">
<?php foreach ($linhas as $chave) {
    print '<option value="'.$chave['ID'].'">'.$chave['NOME'].'</option>';
} ?>
</select>
<?php endif; ?>
</body>
</html>


