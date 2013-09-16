<?php
include_once "../functions/connection.class.php";
include_once "../model/tipo_usuario.controller.php";

$conexao = new connection();

$conexao->openConnection();

$control = new tipoUsuarioController("tipousuario");

$resultados = $control->listarTipoUsuario();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projeto Tanbook</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <section id="wrapper">
            <header>
                LOGO AQUI
            </header>
            <nav>MENU</nav>
            <section id="conteudo">
                <h1>Tipos de usuarios Cadastrados</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Campo 1</th>
                            <th>Campo 2</th>
                            <th>Alterar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($campos = mysql_fetch_array($resultados)): ?>
                            <tr>
                                <td><?php echo $campos["nivelacesso"] ?></td>
                                <td><?php echo $campos["usuario_codigo"] ?></td>
                                <td><?php echo "Alterar" ?></td>
                                <td><?php echo "Deletar" ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
            <footer>RODAPE</footer>
        </section>
    </body>
</html>