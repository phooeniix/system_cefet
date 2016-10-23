<?php
	class DisciplinaInsere{
		public function controler(){
			try{
				$campos = array("nome", "sigla");
				$insere = new Insere("disciplina", $campos);
				$retorno = $insere->model();
			}
			catch(Excepetion $e){
				
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;
		}
	}
?>