<?php
	class DepartamentoRemove{
		public function controler(){
			try{
				$remove = new Remove("departamento");
				$retorno = $remove->model();

			}catch(Exception $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;
		}
	}
?>