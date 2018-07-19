<?php include('header.php'); 

$usuario = $_POST['usuarios'];
$banco = new Select();
$banco->selecionar_usuario($usuario);
var_dump($banco);
?>



<h2>Usuario</h2>
<table>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>