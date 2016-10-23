<?php
	class Departamento{
		public function controler(){
			try{
				$lista = new Lista("departamento");
				$resultado = $lista->model();

				$cabecalho = new Template("View/tabela_departamento.tpl");

				if(!$resultado["erro"]){
					foreach ($resultado["msg"] as $departamento) {
						$tabela = new Template("View/lista_departamento.tpl");
						$tabela->set("nome", $departamento->nome);
						$tabela->set("cod", $departamento->id);

						$dados_tabela[] = $tabela;
					}
					$conteudo_tabela = Template::juntar($dados_tabela);
				}else{
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