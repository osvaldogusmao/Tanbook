<?php


/**
* 
*/

include_once '../functions/crud.class.php';

class tipo_usuario extends crud{

    private $usuario_id;
    private $descricao;


    function __construct(){

    }


    public function getUsuario_id(){
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id){
        return $this->usuario_id = $usuario_id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        return $this->descricao = $descricao;
    }

    public function getTipoUsuario(){
        $this->usuario_id;
        $this->descricao;
    }
}
?>
