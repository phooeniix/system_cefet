<?php
class Busca {
	private $condicao;
	private $tabela;

	public function __construct($tabela = NULL, $condicao = NULL) {
		$conexao = Transacao::get();
		$this->condicao = $condicao;
		$this->tabela = $tabela;
	}
	public function model() {
		try {
			$conexao = Transacao::get();
			$sql = "SELECT * FROM $this->tabela WHERE $this->condicao" ;
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
