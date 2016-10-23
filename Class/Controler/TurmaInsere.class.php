<?php
	class TurmaInsere{
		public function controler(){
			try{
				$campos = array("nome_curso", "serie", "modalidade", "ano");
				$insere = new Insere("turma", $campos);
				$retorno = $insere->model();
			}catch(Exception $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com administrador";
			}
			return $retorno;
		}
	}
?>