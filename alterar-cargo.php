<?php 
require "includes/connection.php";

$id = $_POST['id'];
$descricao = $_POST['descricao'];

$sql_altera = "UPDATE cargo SET descricao = '{$descricao}' WHERE id = {$id}";

if($conexao->query($sql_altera)) {
	$msg = 'Registro alterado com sucesso!';
	$tipo_msg = 'success';
} else {
	$msg = 'Não foi possível alterar';
	$tipo_msg = 'danger';
}

header("Location: cargo.php?msg={$msg}&tipo_msg={$tipo_msg}");

?>