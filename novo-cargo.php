<?php 
	include "layout/header.php";
	include "layout/menu.php";

	
?>

<div class="container">
	<p>&nbsp;</p>
	<h1>Novo cargo</h1>
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
			    <li class="breadcrumb-item" aria-current="page"><a href="cargo.php">Cargos</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Novo cargo</li>
			  </ol>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col">
		    <form method="post" action="salvar-cargo.php">
			    <div class="form-group">
				    <label for="descricao">Cargo:</label>
				    <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Digite o cargo" required>
			    </div>
			    <button class="btn btn-success" type="submit">Salvar</button>
		    </form>
		</div>
	</div>
</div>
<?php 
	include "layout/footer.php";
?>