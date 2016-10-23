<?php
	class ProfessorInsere{
		public function controler(){
			try{
				$campos = array("id_departamento", "nome", "apelido");
				$insere = new Insere("professor", $campos);
				$retorno = $insere->model();
			}
			catch(Excepetion $e){
				$retorno["erro"]=true;
				$retorno["msg"]="Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;

		}
	}
?>