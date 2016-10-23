<?php
class Altera {
	private $id;
	private $tabela;
	private $valores;
	
	public function __construct($tabela,$campos) {
		$conexao = Transacao::get();
		$this->id = $conexao->quote($_POST["id"]);
		$this->tabela = $tabela;
		$valor = array();
		foreach($campos as $campo) {
			$dado = $conexao->quote($_POST[$campo]);
			$valor[] = "$campo = $dado";
		}
		$this->valores = implode(", ", $valor);
	}
	
	public function model() {
		try {
			$conexao = Transacao::get();
			$sql = "UPDATE $this->tabela SET $this->valores WHERE id=$this->id";
			$resultado = $conexao->Query($sql);
			if($resultado->rowCount()==0) {
				$retorno["erro"] = true;
				$retorno["msg"] = "Nenhum valor alterado!";
			}
			else {
				$retorno["erro"] = false;
				$retorno["msg"] = "Alterado com sucesso";
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