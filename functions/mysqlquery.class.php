<?php  

function mysqlquery($id, $sql, $error = 1){
	
	if(empty($sql) or !($id))
		return 0;

	if(!($res = mysql_query($sql, $id))){
		if($error){
			echo  "Ocorreu um erro ao executar a query";
			exit;
		}
	}
	return $res;
}


?>