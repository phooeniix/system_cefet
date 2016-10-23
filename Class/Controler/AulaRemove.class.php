<?php
	class AulaRemove{
		public function controler(){
			try{
				$remove = new Remove("aula");
				$retorno = $remove->model();
			}
			catch(Exception $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;
		}
	} 
?>