<?php

/**
 * @author Jão
 * @modified date: 15/09
 */

class TipoDeUsuario{

    private $id;
    private $nome;
    private $descricao;


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

}

?>
