<?php

/*
  Descrição do arquivo: Controller responsavel pelas consultas crud de historia.
  @autor - Rafael de Pádua
  @data de criação - 28/09/2013
  @arquivo - historia.controller.php
 */

include_once "../../functions/crud.class.php";

class historia extends crud {

    public function __contructor() {
        parent::__contructor("Historia");
    }

    public function saveHistoria($historia) {
        return $this->save($historia);
    }

    public function deleteHistoria($valor, $atributo) {
        return $this->delete($valor, $atributo);     
    }

    public function updateHistoria($valor, $atributo) {
        return $this->update($valor, $atributo);
    }
    
    public function load($value, $attr) {
        return $this->load($value, $attr);
    }

}

?>
