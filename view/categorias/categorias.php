<?php

/*
	Descrição do arquivo: Esta é a pagina responsavel pos Cadastrar, listar e Editar todas as Categorias
	@autor - Lukas Roberto
	@data de criação - 28/09/2013
	@arquivo - categorias.php

*/

include_once "../../controller/categoria.controller.class.php";
include_once "../../model/categoria.class.php";

session_start();

  if (!isset($_SESSION['id'])) {
    header("Location: ../../view/login/login.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Projeto Tanbook</title>
<!-- Estilos -->
<link href="../../css/style.css" rel="stylesheet" type="text/css">
<link href="../../css/bootstrap.css" rel="stylesheet">
<link href="../../css/validation.css" rel="stylesheet">
<link href="../../css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
<section id="wrapper">
  <header> LOGO AQUI </header>
  <nav>MENU</nav>
      <?php
	$categoria_controller = new categoriaController();
	$resultados = $categoria_controller->listarCategoria();	
	
	$categoria = new Categoria();

if (isset($_POST['update'])) {

	$categoria->setId($_POST['updateId']);
	$categoria->setDescricao($_POST['updateDescricao']);

	if($categoria->getId() > 0){
		$categoria_controller->update($categoria, 'id');
		$resultados = $categoria_controller->listarCategoria();	
	}
}
if (isset($_POST['save'])) {

	$categoria->setDescricao($_POST['saveDescricao']);

	if($categoria->getDescricao() <> NULL){
		$categoria_controller->save($categoria);
		$resultados = $categoria_controller->listarCategoria();	
	}else{}

}
if (isset($_POST['delete'])) {

	$categoria->setId($_POST['deleteId']);

	$deleteId = $_POST['deleteId'];


	if($categoria->getId() > 0){
		$categoria_controller->remove($deleteId, 'id');
		$resultados = $categoria_controller->listarCategoria();	
	}else{}

}

	?>
      <section id="conteudo">
    <div id="cadastrar">
      <form name="save" method="post" action="categorias.php">
        Nome da Categoria:
        <input type="text" name="saveDescricao" id="saveDescricao" required>
        <br>
        <input type="submit" name="save" id="save" value="Cadastrar">
      </form>
    </div>
    <?php 
			//verifica se existem Categorias cadastrados, se existirem lista as Categorias
			if ($resultados){
		?>
    <div id="listaDeCategorias">
      <table class="table-striped table-hover">
        <thead>
          <tr>
            <th>Código</th>
            <th>Categoria</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php
				while($campos = mysql_fetch_array($resultados)):
		?>
          <tr>
            <td><?php echo $campos["id"] ?></td>
            <td><?php echo $campos["descricao"] ?></td>
            <td><a href="#update" role="button" class="btn" data-toggle="modal" onclick="javascript:passandoDadosParaUpdate('<?php echo $campos["id"] ?>',' <?php echo $campos["descricao"] ?>')">Editar</a></td>
            <td><a href="#delete" role="button" class="btn" data-toggle="modal" onclick="javascript:passandoDadosParaDelete('<?php echo $campos["id"] ?>',' <?php echo $campos["descricao"] ?>')">Excluir</a></td>
          </tr>
          <?php
		  		endwhile;
		?>
        </tbody>
      </table>
    </div>
    <?php		
                //se não existir Categorias cadastrados, exibe menssagem	
	  		}else{
		?>
    <div class="alert alert-info"> Não existem Categorias cadastradas </div>
    <?php
				}
 		  ?>
  </section>
  <div id="update" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Editar Categoria</h3>
    </div>
    <div class="modal-body">
    <form class="form-horizontal" name="formUpdate" method="post" action="categorias.php">
      <label>Código</label>
      <input type="text" id="updateId" name="updateId" class="input-mini">
      <label>Descrição</label>
      <input type="text" id="updateDescricao" name="updateDescricao" required>
      </div>
      <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
      <button type="submit" name="update" id="update" class="btn btn-success">Salvar Edição</button>
    </form>
  </div>
  </div>
  
  
    <div id="delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Excluir Categoria</h3>
    </div>
    <div class="modal-body">
    	<div class="alert alert-danger">Confirma exlusão desta Categoria?</div>

    <form class="form-horizontal" name="formDelete" method="post" action="categorias.php">
      <label>Código</label>
      <input type="text" id="deleteId" name="deleteId" class="input-mini">
      <label>Descrição</label>
      <input type="text" id="deleteDescricao" name="deleteDescricao" required>
      </div>
      <div class="modal-footer">     
      <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
      <button type="submit" name="delete" id="delete" class="btn btn-danger">Excluir Categoria</button>
    </form>
  </div>
  </div>
  
  <footer>RODAPE</footer>
</section>
<script src="../../js/jquery.js"></script> 
<script src="../../js/jquery.validate.min.js"></script> 
<script src="../../js/bootstrap-transition.js"></script> 
<script src="../../js/bootstrap-alert.js"></script> 
<script src="../../js/bootstrap-modal.js"></script> 
<script src="../../js/bootstrap-dropdown.js"></script> 
<script src="../../js/bootstrap-scrollspy.js"></script> 
<script src="../../js/bootstrap-tab.js"></script> 
<script src="../../js/bootstrap-tooltip.js"></script> 
<script src="../../js/bootstrap-popover.js"></script> 
<script src="../../js/bootstrap-button.js"></script> 
<script src="../../js/bootstrap-collapse.js"></script> 
<script src="../../js/bootstrap-carousel.js"></script> 
<script src="../../js/bootstrap-typeahead.js"></script> 
<script>
//passa a pergunta para o modal exibir na tela
function passandoDadosParaUpdate(idCategoria, updateDescricao) {
	 document.formUpdate.updateId.value = idCategoria;
 	 document.formUpdate.updateDescricao.value = updateDescricao;
	};
function passandoDadosParaDelete(idCategoria, updateDescricao) {
	 document.formDelete.deleteId.value = idCategoria;
 	 document.formDelete.deleteDescricao.value = updateDescricao;
	};	
</script>
</body>
</html>