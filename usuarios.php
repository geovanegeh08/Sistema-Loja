<?php
	//abaixo incluo o arquivo de conexão com o banco de dados
	require "includes/connection.php";
	include "layout/header.php"; 
	include "layout/menu.php";
	$sql_usuarios = "SELECT * FROM usuario";
	//nesta linha, executo a consulta montada
	$usuario = $conexao->query($sql_usuarios); 
?>
<div class="container">
	<p>&nbsp;</p>
	<h1>Usuários</h1>
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Usuários</li>
			  </ol>
			</nav>
		</div>
	</div>
	<div class="row">
		<?php if(isset($_GET['msg']) && isset($_GET['tipo_msg'])){ ?>
			<div class="alert alert-<?php echo $_GET['tipo_msg']; ?> col-12 esconde">
				<?php echo $_GET['msg']; ?>
			</div>
		<?php } ?>
		<div class="col">
			<a href="novo-usuario.php" class="btn btn-primary mb-1 float-right">
				Novo usuário
			</a>
		</div>
		<p>&nbsp;</p>
		<table class="table table-bordered table-striped table-hover">
			<tr>
	<div class="row">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Ações</th>
			</tr>
			<?php while($dados = $usuario->fetch_array(MYSQLI_ASSOC)) { //aqui eu starto o loop dos dados da consulta ?>
				<tr>
					<td><?php echo $dados['id']; ?></td>
					<td><?php echo $dados['nome']; ?></td>
					<td><?php echo $dados['email']; ?></td>
					<td>
						<a href="novo-usuario.php?id=<?php echo $dados['id']; ?>" class="btn btn-success">
							<i class="fas fa-edit"></i>
						</a>
						<a href="exclui-usuario.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?')">
							<i class="fas fa-trash"></i>
					</td>
				</tr>

			<?php } //aqui finalizo o loop dos dados ?>
		</table>
	</div>
</div>

<?php include "layout/footer.php"; ?>