<?php

/*

  Controller da classe Categoria

  @author João Evangelista

  @date 01/10/2013 

  @nameFile categoria.controller.class.php

*/

include_once '../../functions/crud.class.php';

class categoriaController extends CRUD {

    function __construct() {
        parent::__construct("Categoria");
    }
		public function listarCategoria(){
		$resultado = $this->execute_query("SELECT * FROM " . $this->getTabela());
		
		$regs = mysql_num_rows($resultado);
		if ($regs > 0){
			return $resultado;
		}else{
			return false;
		}
	}
}
			

	

?>
