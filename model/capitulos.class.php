<?php

/*
  Descrição do arquivo
  @autor - Rafael Pádua, Lukas, Rodrigo
  @data de criação - 19/10/2013
  @arquivo - capitulos.class.php
 */

class Capitulos {

    private $id;
    private $historia_id;
    private $tangram_id;
    private $texto;
    private $ordem;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getHistoria_Id() {
        return $this->historia_id;
    }

    public function setHistoria_Id($historia_Id) {
        $this->historia_id = $historia_Id;
    }

    public function getTangran_Id() {
        return $this->tangram_id;
    }

    public function setTangram_Id($tangram_Id) {
        $this->tangram_id = $tangram_Id;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getOrdem() {
        return $this->ordem;
    }

    public function setOrdem($ordem) {
        $this->ordem = $ordem;
    }

}

?>
