<?php

    /**
    *   Descrição do Arquivo
    *   @author - Vanessa Rossi
    *   @Data De Criação - 29/10/2013
    *   @Arquivo  - resposta.controller.class.php
    */

include_once "../../functions/crud.class.php";

class RespostaController extends CRUD {

    public function __construct(){
        parent::__construct("Resposta");
    }

}