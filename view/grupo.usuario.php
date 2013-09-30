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
                <?php
                if (!empty($_POST)) {



                    $con = new conexao();
                    $con->connect();

                    $con->disconnect();
                } else {

                    echo "Preencha os campos abaixo para cadastrar um novo grupo de usuário";
                }
                ?>  
            </section>

            <form action="cadastra.grupodeusuario.php" method="post">
                <fieldset>
                    <legend>Cadastro de Grupo de Usuários</legend>

                    <ol>
                        <li>
                            <label for="nome">
                                <div align="left">Nome da Escola:</div>
                            </label>
                            <div align="left">
                                <input name="nome" type="text" placeholder="Nome da escola" />
                            </div>
                        </li>

                        <li>
                            <label for="Nickname">
                                <div align="left">Nickname :</div>
                            </label>
                            <div align="left">
                                <input name="Nickname" type="text" placeholder="Nickname" />
                            </div>
                        </li>

                        <li>
                            <label for="licenca">
                                <div align="left">Licença: </div>
                            </label>
                            <div align="left">
                                <input name="licenca" type="number" placeholder="   
                                       Licença" />
                            </div>
                        </li>

                        <li>
                            <label for="vallicenca">
                                <div align="left">Validade da Licença: </div>
                            </label>
                            <div align="left">
                                <input name="vallicenca" type="date" placeholder="vallicenca" />
                            </div>
                        </li> 
                        <li>
                            <label for="cod_usuario">
                                <div align="left">Código do Usuário: </div>
                            </label>
                            <div align="left">
                                <input name="cod_usuario" type="text" placeholder="Código do Usuário" />
                            </div>
                        </li>

                        <li>
                            <div align="left">
                                <input type="submit" value="Cadastrar" />
                            </div>
                        </li>
                    </ol>
                </fieldset>
            </form>
        </section>
        <footer>RODAPE</footer>
    </section>




</body>
</html>
