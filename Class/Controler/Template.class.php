<?php
class Template {
	private $arquivo;
	private $valores = array();
	
	public function __construct($arquivo) {
		$this->arquivo = $arquivo;
	}
	
	public function set($chave, $valor) {
		$this->valores[$chave] = $valor;
	}
	
	public function saida() {
		if (!file_exists($this->arquivo)) {
			return "Erro ao carregar arquivo de template ($this->arquivo).<br />";
		}
		
		$saida = file_get_contents($this->arquivo);
		foreach ($this->valores as $chave => $valor) {
			$tagToValor = "[@$chave]";
			$saida = str_replace($tagToValor, $valor, $saida);
		}
		return $saida;
	}
	
	static public function juntar($templates, $separador = "\n") {

		$saida = "";

		foreach ($templates as $template) {
			if(get_class($template) !== "Template") {
				$conteudo = "Erro, tipo incorreto - Template esperado.";
			}
			else {
				$conteudo =  $template->saida();
			}
			$saida .= $conteudo . $separador;
		}
		return $saida;
	}
}
?>