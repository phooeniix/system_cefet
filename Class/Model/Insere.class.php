<?php
class Insere {
	private $tabela;
	private $campos;
	private $valores;
	
	public function __construct($tabela, $campos) {
		$conexao = Transacao::get();
		$this->tabela = $tabela;
		foreach($campos as $campo){
			$valor[] = $conexao->quote($_POST[$campo]);
		}
		$this->valores = implode(", ", $valor);
		$this->campos = implode(", ", $campos);
	}
	
	public function model() {
		try {
			$conexao = Transacao::get();
			$sql = "INSERT INTO $this->tabela ($this->campos) VALUES ($this->valores)";
			$resultado = $conexao->Query($sql);
			if($resultado->rowCount()==0) {
				$retorno["erro"] = true;
				$retorno["msg"] = "Nenhum valor inserido!";
			}
			else {
				$retorno["erro"] = false;
				$retorno["msg"] = "Inserido com sucesso";
				$retorno["id"] = $conexao->lastInsertId();
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