<?php
	class DepartamentoAltera{
		public function controler(){
			try{
				$campos = array("nome");
				$altera = new Altera("departamento", $campos);
				$retorno = $altera->model();

			}catch(Exception $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;
		}
	}
?>