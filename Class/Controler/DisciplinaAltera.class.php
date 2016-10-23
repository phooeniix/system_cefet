<?php
	class DisciplinaAltera{
		public function controler(){
			try{
				$campos = array("nome", "sigla");
				$altera = new Altera("disciplina", $campos);
				$retorno = $altera->model();

			}catch(Excepetion $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com o administrador";
			}

			return $retorno;
		}
	}
?>