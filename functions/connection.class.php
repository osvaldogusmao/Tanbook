<?php 

/*
	Descrição do arquivo
	@autor - Ivan Simionato
	@data de criação - 08/09/2013
	@arquivo - connection.class.php

*/

class Connection{
private $parameters = array("host"=>"186.202.152.92",
								"user"=>"feob24",
								"password"=>"tanbook010203@",
								"database"=>"feob24");


	public function openConnection(){

		$this->connection = mysql_connect($this->parameters["host"], $this->parameters["user"], $this->parameters["password"]);

		if (!$this->connection) {
			die ("Erro ao estabelecer conexão com a base de dados");
		} else{
			$this->selectDatabase();
		}
		
	}

	private function selectDatabase(){
		$database = mysql_select_db($this->parameters["database"], $this->connection);
		
		if (!$database) {
			die ("Base de dados não encontrada");
		} 

	}

	public function closeConnection(){
		mysql_close($this->connection);
	}

}

 ?>