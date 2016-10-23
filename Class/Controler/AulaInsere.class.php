<?php
	class AulaInsere{
		public function controler(){
			try{
				$campos = array("id_professor", "id_disciplina", "id_turma", "grupo");
				$insere = new Insere("aula", $campos);
				$retorno = $insere->model();
			}
			catch(Exception $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;
		}
	} 
?>