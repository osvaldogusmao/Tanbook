<?php

/*
  Descrição do arquivo: Controller responsavel pelas consultas crud de historia.
  @autor - Rafael de Pádua
  @data de criação - 28/09/2013
  @arquivo - historia.controller.php
 */

include_once "../../functions/crud.class.php";

class HistoriaController extends CRUD {

    public function __construct() {
        parent::__construct("Historia");
    }

    public function uploadCapa() {

        $extensaoOriginal = strtolower(end(explode("/", $_FILES['capa']['type'])));

        $uploadDir = '/Users/osvaldogusmao/Projects/workspace/workspace_unifeob/tanbook/capas/';
        $file = substr(md5(time()), 0, 10) . "_" . time() . "." . $extensaoOriginal;
        $fileName = $uploadDir . $file;

        if (move_uploaded_file($_FILES['capa']['tmp_name'], $fileName)) {
            return $file;
        } else {
            return false;
        }
    }

//    public function listarHistoria() {
//        $resultado = $this->execute_query("SELECT * FROM " . $this->getTabela());
//
//        $regs = mysql_num_rows($resultado);
//        if ($regs > 0) {
//            return $resultado;
//        } else {
//            return false;
//        }
//    }

}

?>
