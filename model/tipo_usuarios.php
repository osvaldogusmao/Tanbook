<?php

/*
 * Class tipo de usuarios
 */

class tipo_usuario {

private $usuario_codigo;
private $grupo;
private $nivelacesso;
private $sexo;


public function __construct(){
parent::__construct();
}

public function getUsuario_codigo() {
    return $this->usuario_codigo;
}

public function getGrupo() {
    return $this->grupo;
}

public function getNivelacesso() {
    return $this->nivelacesso;
}

public function getSexo() {
    return $this->sexo;
}

public function setUsuario_codigo($usuario_codigo) {
    $this->usuario_codigo = $usuario_codigo;
}

public function setGrupo($grupo) {
    $this->grupo = $grupo;
}

public function setNivelacesso($nivelacesso) {
    $this->nivelacesso = $nivelacesso;
}

public function setSexo($sexo) {
    $this->sexo = $sexo;
}

public function getTipoUsuario(){
    $this->usuario_codigo;
    $this->grupo;
    $this->nivelacesso;
    $this->sexo;        
    
}

}
?>
