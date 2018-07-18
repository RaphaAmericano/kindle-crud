<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require_once 'classes/conexao.class.php'; ?>
</head>
<body>

<h2>Cadastrar Usuario</h2>
<form action="backend.php" method="POST"></form>
    <label for="nome">Nome</label>
    <input type="text" name="nome">
    <label for="email">Email</label>
    <input type="email" name="email">
    <label for="telefone">Telefone</label>
    <input type="tel" name="telefone">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" ></textarea>
    <input type="submit" name="submit" value="enviar">
</form>

<h2>Lista de Usuarios</h2>

<?php 
$usuarios = new Select();
$linhas = $usuarios->selecionar_todos();
print $linhas;
var_dump($usuarios);
if(!empty($linhas)): ?>
<select name="usuarios">
<?php foreach ($linhas as $chave => $valor) {
    print '<option value="'.$chave.'">'.$valor.'</option>';
} ?>
</select>
<?php endif; ?>




</body>
</html>


