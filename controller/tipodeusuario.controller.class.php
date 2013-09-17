<?php
/*
	Descrição do arquivo
	@autor - Rafael de Pádua
	@data de criação - 16/09/2013
	@arquivo - TipoUsuarioController.class.php
*/


include_once"../../functions/crud.class.php";
include_once "../../functions/connection.class.php";

class TipoUsuarioController extends crud {


    public function __construct() {
        parent::__construct("tipodeusuario");
    }

    public function lista() {
    	return $this -> execute_query("select * from ". $this -> getTabela(). ";");
    }
}

?>