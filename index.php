
<?php 
    include('header.php'); 
    include('backend/index.backend.php');    
?>


<h2>Cadastrar Usuario</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="novo[nome]">
    <label for="email">Email</label>
    <input type="email" name="novo[email]">
    <label for="telefone">Telefone</label>
    <input type="tel" name="novo[telefone]">
    <label for="descricao">Descrição</label>
    <textarea name="novo[descricao]"></textarea>
    <input type="submit" value="enviar">
</form>



<h2>Lista de Usuarios</h2>

<?php 
$usuarios = new Select();
$linhas = $usuarios->selecionar_todos('USUARIO');

if(!empty($linhas)): ?>
<form action="usuario.php" method="POST">
    <select name="usuarios">
    <?php foreach ($linhas as $chave) {
        print '<option value="'.$chave['ID'].'">'.$chave['NOME'].'</option>';
    } ?>
    </select>
    <input type="submit" value="Selecionar">
</form>
<?php else: ?>
<h3>Não há usuários cadastrados</h3>
<?php endif; ?>

<script src="js/script.js"></script>
</body>
</html>


