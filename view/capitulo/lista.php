<?php
/*
  Descrição do arquivo: Esta é a pagina responsavel pelo Cadastro, lista e Edição de todos capitulos de Histórias
  @autor - Rafael de Pádua
  @data de criação - 19/10/2013
  @arquivo - cadastro.php
 */

include_once '../../controller/capituloDaHistoria.controller.class.php';
include_once '../../controller/historia.controller.class.php';
include_once '../../model/capitulos.class.php';


session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../view/login/login.php");
}

$historiaController = new HistoriaController();
$resultados = $historiaController ->listObjects();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projeto Tanbook</title>
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
        <link href="../../css/bootstrap.css" rel="stylesheet">        
        <script src="../../js/jquery.js"></script> 
        <script src="../../js/bootstrap-transition.js"></script> 
        <script src="../../js/bootstrap-modal.js"></script> 
        <script type="text/javascript" src="../../js/jquery-1.7.1.min.js"></script>
        <script src="../../js/jquery.js"></script>
        <script type="text/javascript">
            function getValor(valor) {
                $("#bloco2").load("../../js/ajaxValor.php", {id: valor});
            }
            ;
        </script>
    </head>
    <body>
        <section id="wrapper">
            <header> LOGO AQUI </header>
            <nav>MENU</nav>
            <section id="conteudo">
                <div id="listaDeCategorias">
                    <div id="bloco1">
                        <table>
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Historia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($campos = mysql_fetch_array($resultados)): ?>
                                    <tr>
                                        <td><?php echo $campos["id"] ?></td>
                                        <td><?php echo $campos["nome"] ?></td>
                                        <td><a href="#exibir" role="button" class="btn" data-toggle="modal" onclick="getValor(<?php echo $campos["id"] ?>);"> + </a></td>
                                    </tr>

                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>

                    <div id="exibir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Capitulos</h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" name="formUpdate" method="post" action="#"></form>
                            <div>
                                <table>
                                    <tr>
                                        <td id="bloco2"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                            </form>
                        </div>
                    </div>


                    <div id="update" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Editar Capitulo</h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" name="formUpdate" method="post" action="categorias.php">
                            </form>
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
                            <h3 id="myModalLabel">Excluir capitulo</h3>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger">Confirma exlusão deste Capitulo?</div>

                            <form class="form-horizontal" name="formDelete" method="post" action="categorias.php"></form>

                        </div>
                        <div class="modal-footer">     
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                            <button type="submit" name="delete" id="delete" class="btn btn-danger">Excluir Capitulo</button>
                            </form>
                        </div>
                    </div>
            </section>
            <footer>RODAPE</footer>
        </section>
    </body>
</html>
