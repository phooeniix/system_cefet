<?php
class Remove {
	private $id;
	private $tabela;
	
	public function __construct($tabela) {
		$conexao = Transacao::get();
		$this->id = $conexao->quote($_GET["id"]);
		$this->tabela = $tabela;
	}
	
	public function model() {
		try {
			$conexao = Transacao::get();
			$sql = "DELETE FROM $this->tabela WHERE id=$this->id";
			$resultado = $conexao->Query($sql);
			if($resultado->rowCount()==0) {
				$retorno["erro"] = true;
				$retorno["msg"] = "Nenhum valor removido!";
			}
			else {
				$retorno["erro"] = false;
				$retorno["msg"] = "Removido com sucesso";
			}
		}
		catch(Exception $e) {
			$retorno["erro"] = true;
			$retorno["msg"] = "Ocorreu um erro entre em contato com o Administrador ".$e->getMessage();
		}
		return $retorno;
	}
}
?>