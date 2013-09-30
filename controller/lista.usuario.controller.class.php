<?php
/*
  Descrição do arquivo: Controller responsavel pelas consultas para listagem de usuarios na tela lista.php
  @autor - Lukas Roberto
  @data de criação - 07/09/2013
  @arquivo - lista.usuario.controller.php
 */

include_once "../../functions/crud.class.php";
include_once "../../functions/connection.class.php";

class usuarioControl extends crud {

    // Método construtor
    public function __construct() {
        parent::__construct("usuario");
    }

    // Método de listagem
    public function listarUsuario($where = NULL) {

        if ($where) {
            $select = $this->execute_query("SELECT grupoDeUsuario.nome AS nomeGrupo, usuario.nome AS nomeUsuario, tipodeusuario.nome AS nomeTipo, usuario.id, usuario.email, usuario.sexo, usuario.dataDeNascimento, usuario.urlFacebook, usuario.apelido, usuario.avatar FROM usuario, tipodeusuario, grupoDeUsuario WHERE usuario.grupoDeUsuario_id = grupoDeUsuario.id AND usuario.tipoDeUsuario_id = tipodeusuario.id and usuario.id =" . $where);
            //$select = $this->execute_query("SELECT * FROM ".$this->getTabela()." WHERE id =".$where);
        } else {
            $select = $this->execute_query("SELECT grupoDeUsuario.nome AS nomeGrupo, usuario.nome AS nomeUsuario, tipodeusuario.nome AS nomeTipo, usuario.id, usuario.email, usuario.sexo, usuario.dataDeNascimento, usuario.urlFacebook, usuario.apelido, usuario.avatar FROM usuario, tipodeusuario, grupoDeUsuario WHERE usuario.grupoDeUsuario_id = grupoDeUsuario.id AND usuario.tipoDeUsuario_id = tipodeusuario.id");

            //$select = $this->execute_query("SELECT * FROM ".$this->getTabela());
        }

        $regs = mysql_num_rows($select);

        //Verifica se tem usuarios cadastrados no BD, se tiver retorna uma lista com os usuarios
        if ($regs > 0) {
            return $select;

            //se nao tiver usuarios cadastrados retorna false
        } else {
            return false;
        }
    }

    public function tipoUsuario($where) {

        return $select = $this->execute_query("SELECT * FROM tipodeusuario WHERE id =" . $where);
    }

}
?>