<?php 

/**
*
* Projeto : Tanbook
* Projeto Interdisciplinar : UNIFeob - Fundação de Ensino Octávio Bastos
* Turma III - Análise e Desenvolvimento de Sistema
* 
* Objetivo
*
* Prover os métodos de salvar, atualziar e remover de forma genérica para ser usada
* pelos controllers.
*
*
* Versões
*
* 0.0.1 - Criação da classe - Osvaldo Gusmão
*/


include_once 'reflection.class.php';

class crud {

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
		
		$ref = new Reflections;
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

		$ref = new Reflections;
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
	* @method execute_query()
	* @param $sql (SQL Script que será executado no banco)
	* @return true || false
	*
	**/
	private function execute_query($sql){
		echo $sql . "<br/>";
	}

}