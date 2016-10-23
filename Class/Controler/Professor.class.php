<?php
class Professor{
	
	public function controler() {
		try {
			$lista = new Lista("departamento");
			$departamento = $lista->model();
			
			$cabecalho = new Template("View/cabeca_professor.tpl");
			if(!$departamento["erro"]) {
				$dados_depart = array();
				foreach($departamento["msg"] as $dept) {
					$option = new Template("View/option.tpl");
					$option->set("valor",$dept->id);
					$option->set("campo",$dept->nome);
					$opt[] = $option;

					$dep = new Template("View/lista_depart.tpl");
					$dep->set("cod", $dept->id);
					$dep->set("nome", $dept->nome);

					$busca = new Busca("professor", "id_departamento = {$dept->id}");
					$professores = $busca->model();
					$conteudo_tabela = "";

					if(!$professores["erro"]){
						$dados_tabela = array();
						foreach ($professores["msg"] as $professor) {
							$tabela = new Template("View/lista_tabela_professor.tpl");
							$tabela->set("nome", $professor->nome);
							$tabela->set("apelido", $professor->apelido);
							$tabela->set("cod", $professor->id);
							$dados_tabela[]=$tabela;
						}
						$conteudo_tabela = Template::juntar($dados_tabela);
					}
					$dep->set("professor", $conteudo_tabela);
					$dados_depart[] = $dep;
				}
				$conteudo_dept = Template::juntar($dados_depart);
				$cabecalho->set("departamento_professor", $conteudo_dept);
			}
			$cabecalho->set("controler", "professor");
			$conteudo_opt = Template::juntar($opt);
			$cabecalho->set("option", $conteudo_opt);
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