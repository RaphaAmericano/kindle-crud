
<?php 
    include('header.php'); 
    include('backend/index.backend.php');    
?>

<div class="row">
    <div class="col">
        <h2>Cadastrar Usuario</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="nome">Nome</label>
            <input type="text" name="novo[nome]" class="form-control">
            <label for="email">Email</label>
            <input type="email" name="novo[email]" class="form-control">
            <label for="telefone">Telefone</label>
            <input type="tel" name="novo[telefone]" maxlength="11" minlength="10" class="form-control">
            <label for="descricao">Descrição</label>
            <textarea name="novo[descricao]" class="form-control"></textarea>
            <input type="submit" value="enviar" class="btn btn-success">
        </form>    
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Lista de Usuarios</h2>
        <?php 
        $usuarios = new Select();
        $linhas = $usuarios->selecionar_todos('USUARIO');

        if(!empty($linhas)): ?>
        <form action="usuario.php" method="POST">
            <select name="usuarios" class="form-control">
            <?php foreach ($linhas as $chave) {
                print '<option value="'.$chave['ID'].'">'.$chave['NOME'].'</option>';
            } ?>
            </select>
            <input type="submit" value="Selecionar" class="btn btn-primary">
        </form>
        <?php else: ?>
        <h3>Não há usuários cadastrados</h3>
        <?php endif; ?>    
    </div>
</div>
</div>
<script src="js/script.js"></script>
</body>
</html>


