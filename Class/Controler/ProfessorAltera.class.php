<?php
	class ProfessorAltera{
		public function controler(){
			try{
				$campos = array("id_departamento", "nome", "apelido");
				$altera = new Altera("professor", $campos);
				$retorno = $altera->model();
			}
			catch(Excepetion $e){
				$retorno["erro"]=true;
				$retorno["msg"]="Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;
		}
	}
?>