<?php
include_once '../../controller/historia.controller.class.php';

$controller = new HistoriaController();

$resultados = $controller->listObjects();


session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../../view/login/login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Projeto Tanbook</title>
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/reset.css" type="text/css" charset="utf-8">
        <link rel="stylesheet" href="css/core.css" type="text/css" charset="utf-8">
        <link rel="stylesheet" href="css/accordion.core.css" type="text/css" charset="utf-8">
        <script type="text/javascript" src="../../js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript">
            function getValor(valor) {
                $("#topico").load("../../js/ajax_1.php", {id: valor});
            }
            ;
        </script>

        <style type="text/css">
            .loading {
                display: none;
            }
            .accordion {
                border: 1px solid #ccc;
                width:  50%;
            }
            .accordion li h3 a {
                background:             #666;
                background:             #666 -webkit-gradient(linear, left top, left bottom, from(#999), to(#666)) no-repeat;
                background:             #666 -moz-linear-gradient(top,  #999,  #666) no-repeat;
                border-bottom:          1px solid #333;
                border-top:             1px solid #ccc;
                color:                  #fff;
                display:                block;
                font-style:             normal;
                margin:                 0;
                padding:                5px 10px;
                text-shadow:            0 -1px 2px #333, #ccc 0 1px 2px;
            }
            .accordion li.active h3 a {
                background:             #369;
                background:             #369 -webkit-gradient(linear, left top, left bottom, from(#69c), to(#369)) no-repeat;
                background:             #369 -moz-linear-gradient(top,  #69c,  #369) no-repeat;
                border-bottom:          1px solid #036;
                border-top:             1px solid #9cf;
                text-shadow:            0 -1px 2px #036, #9cf 0 1px 2px;
            }
            .accordion li.locked h3 a {
                background:             #963;
                background:             #963 -webkit-gradient(linear, left top, left bottom, from(#c96), to(#963)) no-repeat;
                background:             #963 -moz-linear-gradient(top,  #c96,  #963) no-repeat;
                border-bottom:          1px solid #630;
                border-top:             1px solid #fc9;
                text-shadow:            0 -1px 2px #630, #fc9 0 1px 2px;
            }
            .accordion li h3 {
                margin:         0;
                padding:        0;
            }
            .accordion .panel {
                padding:        10px;
            }
        </style>

    </head>
    <body>
        <section id="wrapper">
            <header>
                LOGO AQUI
            </header>
            <nav>MENU</nav>
            <section id="conteudo">

                <ul id="example2" class="accordion">
                    <li>
                        <h3>Historias</h3>
                        <div class="panel loading">
                            <?php while ($campos = mysql_fetch_array($resultados)): ?>
                                <ul>
                                    <li onclick="getValor(<?php echo $campos["id"]?>);"><?php echo $campos["nome"] ?></li>
                                    <ul>
                                        <li id="topico"></li>
                                    </ul>   
                                </ul>

                            <?php endwhile; ?>
                            <div id ="topico"></div>


                        </div>
                    </li>
                </ul>     
                <script type="text/javascript" src="../../js/jquery-1.7.1.min.js" charset="utf-8"></script>
                <script type="text/javascript" src="../../js/jquery.accordion.2.0.js" charset="utf-8"></script>
                <script type="text/javascript">
                    $('#example1, #example3').accordion();
                    $('#example2').accordion({
                        canToggle: true
                    });
                    $('#example4').accordion({
                        canToggle: true,
                        canOpenMultiple: true
                    });
                    $(".loading").removeClass("loading");

                </script>

            </section>
            <footer>RODAPE</footer>
        </section>
    </body>
</html>