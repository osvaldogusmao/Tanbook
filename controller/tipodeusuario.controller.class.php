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
        parent::__construct("tipodeusuario");
    }

    public function lista($where = null) {
        if ($where) {

            $select = $this->execute_query("select * from " . $this->getTabela() . "where id = " . $where);
        } else {

            $select = $this->execute_query("select * from " . $this->getTabela());
        }

        $registros = mysql_num_rows($select);

        if ($registros > 0) {

            return $select;
        }
    }

    public function editar() {
        
    }

}

?>