<?php
	class Disciplina{
		public function controler(){
			try{
				$lista = new Lista("disciplina");
				$resultado = $lista->model();

				$cabecalho = new Template("View/tabela_disciplina.tpl");

				if(!$resultado["erro"]){
					foreach ($resultado["msg"] as $disc) {
						$tabela = new Template("View/lista_disciplina.tpl");
						$tabela->set("nome", $disc->nome);
						$tabela->set("sigla", $disc->sigla);
						$tabela->set("cod", $disc->id);

						$dados_tabela[] = $tabela;
					}
					$conteudo_tabela = Template::juntar($dados_tabela);
				}else{
					$conteudo_tabela = "";
				}
				$cabecalho->set("tabela", $conteudo_tabela);
				
				$retorno["erro"] = false;
				$retorno["msg"] =$cabecalho->saida();
			}
			catch(Exception $e){

				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com o administrador";
			}
			return $retorno;
		}
	}
?>