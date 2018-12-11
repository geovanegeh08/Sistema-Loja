<?php 
require "includes/connection.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql_altera = "UPDATE usuario SET nome = '{$nome}', email = '{$email}', senha = '{$senha}' WHERE id = {$id}";

if($conexao->query($sql_altera)) {
	$msg = 'Registro alterado com sucesso!';
	$tipo_msg = 'success';
} else {
	$msg = 'Não foi possível alterar';
	$tipo_msg = 'danger';
}
header("Location: usuarios.php?msg={$msg}&tipo_msg={$tipo_msg}");

?>