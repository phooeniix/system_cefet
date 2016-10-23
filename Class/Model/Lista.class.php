<?php
class Lista {
	private $tabela;
	public function __construct($tabela = NULL) {
		if($tabela) {
			$this->tabela = $tabela;
		}
		else {
			echo "Faltando o nome da tabela!";
		}
	}
	public function model() {
		try {
			$conexao = Transacao::get();
			$sql = "SELECT * FROM $this->tabela ";
			$resultado = $conexao->Query($sql);
			if($resultado->rowCount()==0) {
				$retorno["erro"] = true;
				$retorno["msg"] = "Nenhum valor encontrado!";
			}
			else {
				while($dados = $resultado->fetchObject()) {
					$tabela[] = $dados;
				}
				$retorno["erro"] = false;
				$retorno["msg"] = $tabela;
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