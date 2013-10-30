<?php

    /**
    *   Descrição do Arquivo
    *   @author - Vanessa Rossi
    *   @Data De Criação - 29/10/2013
    *   @Arquivo  - opcaoDaPergunta.controller.class.php
    */

include_once "../../functions/crud.class.php";

class OpcaoDaPerguntaController extends CRUD {

    public function __construct(){
        parent::__construct("OpcaoDaPergunta");
    }

}