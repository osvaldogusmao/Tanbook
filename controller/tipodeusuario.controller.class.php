<?php

/*
  Descrição do arquivo
  @autor - Rafael de Pádua
  @data de criação - 16/09/2013
  @arquivo - TipoUsuarioController.class.php
 */

include_once"../../functions/crud.class.php";

class TipoUsuarioController extends CRUD {

    public function __construct() {
        parent::__construct("TipoDeUsuario");
    }

    public function lista() {
        return $this->execute_query("SELECT * FROM ".$this->getTabela(). " ;");
     }
}

?>