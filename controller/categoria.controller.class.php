<?php

/*

  Controller da classe Categoria

  @author João Evangelista

  @date 01/10/2013 

  @nameFile categoria.controller.class.php

*/

include_once '../../functions/crud.class.php';

class CategoriaController extends crud {

    function __construct() {
        parent::__construct("Categoria");
    }

}

?>
