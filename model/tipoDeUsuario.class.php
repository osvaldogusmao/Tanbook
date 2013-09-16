<?php


/**
* @author Jão
* @modified date: 15/09
*/

include_once '../functions/crud.class.php';

class tipoDeUsuario extends crud{

    private $id;
    private $nome;
    private $descricao;

    function __construct(){
    }
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }



?>
