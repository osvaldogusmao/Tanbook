<?php

include_once '../functions/connection.class.php';

$conexao = new Connection();

$conexao->openConnection();

$id = $_POST["id"];

$sql = "SELECT * FROM Capitulo where historia_id = $id";

$totalBusca = mysql_query($sql);

if (mysql_num_rows($totalBusca) > 0) {

    while ($resultado = mysql_fetch_array($totalBusca)) {
        "<ul><li>".htmlentities($resultado["texto"])."</li></ul>";
    }
} else {
    echo 'Nenhum Capitulo encontado';
}

$conexao->closeConnection();
?>