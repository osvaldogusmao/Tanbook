<?php
include_once 'testController.php';

// Criando uma instância da classe "test" que foi estendida da classe "crud".
$controller = new TestController();

//métodos da classe test
$testes = $controller->lista();

$id = ( isset($_GET['id']) ) ? $_GET['id'] : 0;

if ($id > 0) {
    $load = $controller->remove($id, 'id');
    header('Location: testView_List.php');
}
?>

<html>
    <head>
        <title>Teste View</title>
    </head>
    <body>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>#</th>
                </tr>	
            </thead>
            <tbody>

                <?php while ($teste = mysql_fetch_assoc($testes)) : ?>
                    <tr>
                        <td><?php echo $teste['id'] ?></td>
                        <td><?php echo $teste['nome'] ?></td>
                        <td>
                            <a href="testView_Edit.php?id=<?php echo $teste['id'] ?>">[Editar]</a>
                            &nbsp;
                            <a href="testView_List.php?id=<?php echo $teste['id'] ?>">[Excluir]</a>
                        </td>
                    </tr>	

                <?php endwhile; ?>

            </tbody>
        </table>

        <br>
        <a href="testView_Edit.php">Novo</a>

    </body>
</html>