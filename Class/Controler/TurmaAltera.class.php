<?php
	class TurmaAltera{
		public function controler(){
			try{
				$campos = array("nome_curso", "serie", "modalidade", "ano");
				$altera = new Altera("turma", $campos);
				$retorno = $altera->model();
			}catch(Exception $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com administrador";
			}
			return $retorno;
		}
	}
?>