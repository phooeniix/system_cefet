<?php
	class DepartamentoInsere {
		public function controler() {
			try {
				$campos = array("nome");
				$insere = new Insere("departamento",$campos);
				$retorno = $insere->model();
			}
			catch(Exception $e) {
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro, entre em contato com o administrador! ".$e->getMessage();
			}
			return $retorno;
		}
	}
?>