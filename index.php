<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function __autoload($classe){
	$pastas = array('Model', 'Controler');
	foreach ($pastas as $pasta)	{
		if (file_exists("Class/{$pasta}/{$classe}.class.php"))		{
			include_once "Class/{$pasta}/{$classe}.class.php";
		}
	}
}

class Aplicacao{
	public static function run()	{
		$layout = new Template("View/layout.tpl");
		$conteudo = "";
		if(isset($_GET["acao"])) {
			$class = $_GET["acao"];
			if(class_exists($class)) {
				Transacao::open();
				$pagina = new $class;
				$retorno = $pagina->controler();
				if($retorno["erro"]) {
					Transacao::rollback();
				}
				else {
					Transacao::close();
				}
				$conteudo = $retorno["msg"];
			}
		}
		// Conteúdo até aqui

		$layout->set("conteudo",$conteudo);
		echo $layout->saida();
	}
}
Aplicacao::run();
?>
