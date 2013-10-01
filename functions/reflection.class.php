<?php 

/**
*
* Projeto : Tanbook
* Projeto Interdisciplinar : UNIFeob - Fundação de Ensino Octávio Bastos
* Turma III - Análise e Desenvolvimento de Sistema
* 
* Objetivo
*
* Auxiliar a recuperação dos atributos das classe e seus valores
*
* 
* Versões
*
* 0.0.1 - Criação da classe - Osvaldo Gusmão
*/

class Reflections {
	
	public function convert($object){
		$fields = array();
		$values = array();

		$reflection = new ReflectionClass($object);
		$atributos = $reflection->getProperties();

		foreach ($atributos as $atributo) {
			$atributo->setAccessible(true);
			if ($atributo->getValue($object)) {
				array_push($fields, $atributo->getName());
				array_push($values, $atributo->getValue($object));
			}
		}

		$keyValue = array('fields' => $fields, 'values' => $values);
		return $keyValue;
	}

	public function get_value_by_type($value){

		$return = "";

		switch (gettype($value)) {
			case 'string':
				$return .= " '" . addslashes($value) . "' ";
				break;
			case 'integer':
				$return .= $value ;
				break;
			case 'boolean':
				$return .= $value ;
				break;
			case 'double':
				$return .= $value ;
				break;
			default :
				$return .= " '" . $value . "' ";
				break;
		}

		return $return;
	}

}