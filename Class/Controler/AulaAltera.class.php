<?php
	class AulaAltera{
		public function controler(){
			try{
				$campos = array("id_professor", "id_disciplina", "id_turma", "grupo");
				$altera = new Altera("aula", $campos);
				$retorno = $altera->model();
			}
			catch(Exception $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;
		}
	} 
?>