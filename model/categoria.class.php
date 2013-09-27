<?php

/*
Descrição do arquivo
@autor - Larissa Machado
@data de criação - 27/09/2013
@arquivo - categoria.class.php

*/

class Categoria {

public function __construct(){

}

private $id;
private $descricao;


public function getId(){
return $this->id;
}

public function setId($id){
$this->id = $id;
}

public function getDescricao(){
return $this->descricao;
}

public function setDescricao($descricao){
$this->descricao = $descricao;
}



}

 ?>