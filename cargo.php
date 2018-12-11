<?php
	//abaixo incluo o arquivo de conexão com o banco de dados
	require "includes/connection.php";

	$sql_cargos = "SELECT * FROM cargo;";
	$cargos = $conexao->query($sql_cargos);


	include "layout/header.php"; 
	include "layout/menu.php"; 
?>
<div class="container">
	<p>&nbsp;</p>
	<h1>Cargos</h1>
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Cargos</li>
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
			<a href="novo-cargo.php" class="btn btn-primary mb-2 float-right">
				Novo Cargo
			</a>
		</div>
		<p>&nbsp;</p>
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th>#</th>
				<th>Cargo</th>
				<th>Ações</th>
			</tr>

			<!-- linha de loop -->
			<?php while($cargo = $cargos->fetch_array(MYSQLI_ASSOC)) { ?>
				<tr>
					<td><?php echo $cargo['id']; ?></td>
					<td><?php echo $cargo['descricao']; ?></td>
					<td>
						<a href="editar-cargo.php?id=<?php echo $cargo['id']; ?>" class="btn btn-success">
							<i class="fas fa-edit"></i>
						</a>
						<a href="deleta-cargo.php?id=<?php echo $cargo['id']; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar?')">
							<i class="fas fa-trash"></i>
						</a>
					</td>
				</tr>
			<?php } ?>
			<!-- fim da linha de loop -->
		</table>
	</div>
</div>

<?php include "layout/footer.php"; ?>