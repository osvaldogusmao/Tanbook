<?php 

/**
*
* Projeto : Tanbook
* Projeto Interdisciplinar : UNIFeob - Fundação de Ensino Octávio Bastos
* Turma III - Análise e Desenvolvimento de Sistema
* 
* Objetivo
*
* Prover os métodos de salvar, atualizar e remover de forma genérica para ser usada
* pelos controllers.
*
*
* Versões
*
* 0.0.1 - Criação da classe - Osvaldo Gusmão
* 0.0.2 - Alteração do método execute_query() - Osvaldo Gusmão
* 0.0.3 - Inclusão do método loadObject() - Osvaldo Gusmão
* 0.0.4 - Inclusão do método listObjects() - Osvaldo Gusmão
*/


include_once 'reflection.class.php';
include_once 'connection.class.php';

abstract class CRUD {

	/**
	*
	* Atributos
	* 
	**/

	private $tabela;

	/**
	*
	* @method __contructor()
	*
	* @param $tabela (Nome da tabela que será presistida no banco de dados)
	*
	**/
	public function __construct($tabela){
		$this->tabela = $tabela;
	}

	/**
	*
	* Métodos Getter
	*
	**/
	public function getTabela(){
		return $this->tabela;
	}

	/**
	*
	* @method save
	* @param $object (Objeto que será persitido no banco de dados)
	* @return true || false
	*
	**/
	public function save($object){
		
		$ref = new Reflections();
		$values = $ref->convert($object);

		$sql = "insert into " . $this->tabela;
		$sql .= " (" . implode(",",$values['fields'])  . ") VALUES ( ";

		$size = count($values['fields']);
		$loop = 1;

		for ($j=0; $j < $size; $j++) { 
			$sql .= $ref->get_value_by_type($values['values'][$j]);
			$sql .= ($loop < $size) ? "," : "";
			$loop++;
		}

		$sql .= " ) ;";

		return $this->execute_query($sql);
	}

	/**
	*
	* @method update()
	* @param $object (Objeto que será persitido no banco de dados)
	* @param $attr (Atributo usado na condição where)
	* @return true || false
	*
	**/
	public function update($object, $attr){
		
		if(empty($attr))
			return false;

		$ref = new Reflections();
		$values = $ref->convert($object);

		$sql = "update " . $this->tabela . " set ";

		$size = count($values['fields']);
		$loop = 1;

		for ($j=0; $j < $size; $j++) { 

			if($values['fields'][$j] != $attr ){
				$sql .= $values['fields'][$j] . ' = ' . $ref->get_value_by_type($values['values'][$j]);
				$sql .= ($loop < $size) ? ", " : " ";
			}
			$loop++;
		}

		$attribute = $ref->get_value_by_type($values['values'][array_search($attr, $values['fields'])]);

		$sql .= "where " . $attr . " = " . $attribute . " ;";

		return $this->execute_query($sql);

	}

	/**
	*
	* @method remove()
	* @param $value (valor que será usado na condição where)
	* @param $attr (Atributo usado na condição where)
	* @return true || false
	*
	**/
	public function remove($value, $attr){
		
		if(empty($attr))
			return false;

		$sql = "delete from " . $this->tabela . " where " . $attr . " = " . $value . " ;";

		return $this->execute_query($sql);

	}


	/**
	*
	* @method load()
	* @param $value (valor que será usado na condição where)
	* @param $attr (Atributo usado na condição where)
	* @return false || Array
	*
	**/
	public function load($value, $attr){

		if(empty($attr))
			return false;

		$sql = "select * from " . $this->tabela . " where " . $attr . " = " . $value . " ;";

		return mysql_fetch_assoc($this->execute_query($sql));
	}

	/**
	*
	* @method loadObject()
	* @param $value (valor que será usado na condição where)
	* @param $attr (Atributo usado na condição where)
	* @return false || Object
	*
	**/
	public function loadObject($value, $attr){

		if(empty($attr))
			return false;

		$sql = "select * from " . $this->tabela . " where " . $attr . " = " . $value . " ;";

		return mysql_fetch_object($this->execute_query($sql), $this->tabela);
	}

	/**
	*
	* @method listObject()
	* @return Objects (Tipados)
	*
	**/
	public function listObjects(){
		$sql = "select * from " . $this->tabela;

		$result = $this->execute_query($sql);

		$objects = array();

		while ($row = mysql_fetch_object($result, $this->tabela)){
			array_push($objects, $row);
		}
		return $objects;
	}


	/**
	*
	* @method execute_query()
	* @param $sql (SQL Script que será executado no banco)
	* @return true || false
	*
	**/
	public function execute_query($sql){
		$conn = new Connection();
		$conn->openConnection();
		$executed = mysql_query($sql);
		$conn->closeConnection();
		return $executed;
	}

}
