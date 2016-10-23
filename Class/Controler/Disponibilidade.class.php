<?php
class Disponibilidade{

	public function controler(){
		try {
			$cabecalho = new Template("View/disponibilidade.tpl");
			}
			$cabecalho->set("controler", "disponibilidade");
			$retorno["erro"] = false;
			$retorno["msg"] = $cabecalho->saida();
		}
		catch (Exception $e) {
			$retorno["erro"] = true;
			$retorno["msg"] = "Ocorreu um erro, entre em contato com o administrador! ".$e->getMessage();
		}
		return $retorno;
	}
}
?>
