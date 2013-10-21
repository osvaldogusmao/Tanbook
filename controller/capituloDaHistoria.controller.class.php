<?php

/*
  Descrição do arquivo
  @autor - Rafael Pádua, Lukas, Rodrigo
  @data de criação - 19/10/2013
  @arquivo - CapituloDaHistoria.controller.class.php
 */

include_once "../../functions/crud.class.php";

class CapituloController extends CRUD {
    
    public function __construct() {
        parent::__construct("Capitulo");
    }
}

?>
