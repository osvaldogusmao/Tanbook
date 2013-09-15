<?php

include_once "../functions/crud.class.php";

class tipoUsuarioController extends crud {

    private $sql_select = "";

    public function __construct($tabela) {
        parent::__construct($tabela);
    }

    function listarTipoUsuario($where = null) {

        if ($where) {
            $this->sql_select = "select * from " . $this->getTabela() . "where " . $where;
        } else {
            $this->sql_select = "select * from " . $this->getTabela();
        }

        $lista = mysql_query($this->sql_select);

        $result = mysql_num_rows($lista);

        if ($result > 0) {
            return $lista;
        } else {
            return "Nenhum registro encontrado!";
        }
    }

}

?>