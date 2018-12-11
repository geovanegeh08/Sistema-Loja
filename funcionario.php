<?php 
	//$mysqli = new mysqli("localhost", "usuario", "senha", "database");
	//nesta linha realizo a conexão
	require "includes/connection.php";
	//nesta linha, monto a consulta a ser realizada
	$sql_funcionarios = "SELECT f.*, c.descricao as cargo 
					 FROM funcionarios f
					 LEFT JOIN  cargo c ON c.id = f.id_cargo
					 ORDER BY c.id DESC";
	//nesta linha, executo a consulta montada
	$funcionario = $conexao->query($sql_funcionarios);
?>

<?php include "layout/header.php"; ?>
<?php include "layout/menu.php"; ?>
<div class="container">
	<p>&nbsp;</p>
	<h1>Funcionários</h1>
	<?php if(isset($_GET['msg']) && isset($_GET['tipo_msg'])) { ?>
		<div class="alert alert-<?php echo $_GET['tipo_msg']; ?> esconde">
			<?php echo $_GET['msg']; ?>
		</div>
	<?php } ?>
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Funcionarios</li>
			  </ol>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a href="novo-funcionario.php" class="btn btn-primary mb-2 float-right">Novo funcionario</a>
		</div>
	</div>
	<div class="row">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Cargo</th>
				<th>CPF</th>
				<th>Matrícula</th>
				<th>Data de Nascimento</th>
				<th>Telefone</th>
				<th>Email</th>
				<th>Sexo</th>
				<th>Data de admissão</th>
			</tr>
			<?php while($dados = $funcionario->fetch_array(MYSQLI_ASSOC)) ?>
				<tr>
					<td><?php echo $dados['id']; ?></td>
					<td><?php echo $dados['nome']; ?></td>
					<td><?php echo $dados['id_cargo']; ?></td>
					<td><?php echo $dados['cpf']; ?></td>
					<td><?php echo $dados['matricula']; ?></td>
					<td><?php echo $dados['dt_nacimento']; ?></td>
					<td><?php echo $dados['telefone']; ?></td>
					<td><?php echo $dados['email']; ?></td>
					<td><?php echo $dados['sexo']; ?></td>
					<td><?php echo $dados['dt_admissao']; ?></td>
					<td>
						<a href="novo-funcionario.php?id=<?php echo $dados['id']; ?>" class="btn btn-success">
							<i class="fas fa-edit"></i>
						</a>
						<a href="exclui-funcionario.php?id=<?php echo $dados['id']; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir?')">
							<i class="fas fa-trash"></i>
						</a>
					</td>
				</tr>

		</table>
		
		

	</div>

</div>

<?php include "layout/footer.php"; ?>