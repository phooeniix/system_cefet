<?php
class BuscaD{
	private $condicao1;
	private $condicao2;
	private $tabela;

	public function __construct($tabela = NULL, $condicao1 = NULL, $condicao2 = NULL) {
		$conexao = Transacao::get();
		$this->condicao1 = $condicao1;
		$this->condicao2 = $condicao2;
		$this->tabela = $tabela;
	}
	public function model() {
		try {
			$conexao = Transacao::get();
			$sql = "SELECT * FROM $this->tabela WHERE $this->condicao1 AND $this->condicao2" ;
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
