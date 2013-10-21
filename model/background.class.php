<?php

/**
 * 	Descrição do Arquivo
 * 	@author - Vanessa Rossi
 * 	@Data De Criação - 16/10/2013
 * 	@Arquivo  - background.class.php
 */

class Background  {

	private $id;
	private $grupo_id;
	private $descricao;
	private $path;
	private $status;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getGrupo_id() {
        return $this->grupo_id;
    }

    public function setGrupo_id($grupo_id) {
        $this->grupo_id = $grupo_id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
    }
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}