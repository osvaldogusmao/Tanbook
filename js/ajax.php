<?php

include_once '../functions/connection.class.php';

$conexao = new Connection();

$conexao->openConnection();

$id = $_POST["id"];

$sql = "SELECT * FROM Capitulo where historia_id = $id";

$totalBusca = mysql_query($sql);

if (mysql_num_rows($totalBusca) > 0) {

    while ($resultado = mysql_fetch_array($totalBusca)) {

        echo "<tr><td>" . htmlentities($resultado["id"]) . " -  " . htmlentities($resultado["texto"]) .
        '  ' . "<a href= '" . htmlentities("#update") . "' role='label' class='btn' data-toggle='modal'>" . htmlentities("editar") .
        "</a><a href= '" . htmlentities("#delete") . "' role='label' class='btn' data-toggle='modal'>" . htmlentities("deletar") .
        "</a></td><tr>";
    }
} else {
    echo 'Nenhum Capitulo encontado';
}

$conexao->closeConnection();
?>