<?php
	class TurmaRemove{
		public function controler(){
			try{
				$remove = new Remove("turma");
				$retorno = $remove->model();
			}catch(Exception $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com administrador";
			}
			return $retorno;
		}
	}
?>