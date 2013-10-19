<?php

/*
  Descrição do arquivo
  @autor - Rafael Pádua, Lukas, Rodrigo
  @data de criação - 19/10/2013
  @arquivo - CapitulosDasHistorias.controllers.class.php
 */

include_once "../../functions/crud.class.php";

class Capitulos extends CRUD {
    
    public function __contructor() {
        parent::__contructor("Capitulo");
    }
    
}

?>
