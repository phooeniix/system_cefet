<?php
	class Turma{
		public function controler(){
			try{
				$lista = new Lista("turma");
				$resultado = $lista->model();

				$cabecalho = new Template("View/tabela_turma.tpl");

				if(!$resultado["erro"]){
					foreach ($resultado["msg"] as $turma) {
						$tabela = new Template("View/lista_turma.tpl");
						$tabela->set("nome_curso", $turma->nome_curso);
						$tabela->set("serie", $turma->serie);
						$tabela->set("modalidade", $turma->modalidade);
						$tabela->set("ano", $turma->ano);
						$tabela->set("cod", $turma->id);

						$dados_tabela[] = $tabela;
					}
					$conteudo_tabela = Template::juntar($dados_tabela);
				}
				else{
					$conteudo_tabela = "";
				}
				
				$cabecalho->set("tabela", $conteudo_tabela);

				$retorno["erro"] = false;
				$retorno["msg"] = $cabecalho->saida(); 
				
			}
			catch(Exception $e){
				$retorno["erro"] = true;
				$retorno["msg"] = "Ocorreu um erro entre em contato com o administrador"; 
			}
			return $retorno;
		}
	}
?>