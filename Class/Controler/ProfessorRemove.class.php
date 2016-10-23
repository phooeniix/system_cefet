<?php
	class ProfessorRemove{
		public function controler(){
			try{
				$remove = new Remove("professor");
				$retorno = $remove->model();
			}
			catch(Excepetion $e){
				$retorno["erro"]=true;
				$retorno["msg"]="Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;
		}
	}
?>