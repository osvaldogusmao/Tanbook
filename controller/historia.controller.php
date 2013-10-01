<?php

/*
  Descrição do arquivo: Controller responsavel pelas consultas crud de historia.
  @autor - Rafael de Pádua
  @data de criação - 28/09/2013
  @arquivo - historia.controller.php
 */

include_once "../../functions/crud.class.php";

class HistoriaController extends crud {

    public function __construct() {
        parent::__construct("Historia");
    }
}

?>
