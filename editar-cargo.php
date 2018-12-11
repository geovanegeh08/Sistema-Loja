<?php 
	include "layout/header.php";
	include "layout/menu.php";

	require "includes/connection.php";

	$id = $_GET['id'];
	$sql_cargo = "SELECT * FROM cargo WHERE id = {$id}";

	$dados = $conexao->query($sql_cargo);

	$cargo = $dados->fetch_assoc();

?>

<div class="container">
	<p>&nbsp;</p>
	<h1>Editar cargo</h1>
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
			    <li class="breadcrumb-item" aria-current="page"><a href="categorias.php">Cargo</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Editar cargo</li>
			  </ol>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col">
		    <form method="post" action="alterar-cargo.php">
			    <div class="form-group">
				    <label for="descricao">Descrição:</label>
				    <input type="text" name="descricao" id="descricao" class="form-control" required value="<?php echo $cargo['descricao'] ?>">

				    <input type="hidden" name="id" value="<?php echo $cargo['id']; ?>">
			    </div>
			    <button class="btn btn-success" type="submit">Salvar</button>
		    </form>
		</div>
	</div>
</div>
<?php 
	include "layout/footer.php";
?>