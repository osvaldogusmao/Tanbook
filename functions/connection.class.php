<?php 


class Connection{
	
	private $connection;
	private $parameters = array("host"=>"localhost",
								"user"=>"root",
								"password"=>"root",
								"database"=>"crudtanbook");

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