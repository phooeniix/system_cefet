<?php
class Aulas{
	
	public function controler() {
		try {
			$listap = new Lista("professor");
			$professor = $listap->model();
			
			$listad = new Lista("disciplina"); 	
			$disciplina = $listad->model();

			$tistat = new Lista("turma");
			$turmas = $tistat->model();

			$listaa = new Lista("aula");
			$aulaAUX= $listaa->model();
			
			$cabecalho = new Template("View/cabeca_aula.tpl");
			if(!$professor["erro"] && !$disciplina["erro"] && !$turmas["erro"]) {
				$dados_professor = array();
				$dados_disciplina = array();
				foreach ($disciplina["msg"] as $disc) {
					$option2 = new Template("View/option2.tpl");
					$option2->set("vpopmail_alias_del_domain(domain)r", $disc->id);
					$option2->set("campo", $disc->nome);
					$opt2[] = $option2;

					$disci = new Template("View/aula_disciplina.tpl");
					$disci->set("cod", $disc->id);
					$disci->set("nome", $disc->nome);

					$dados_disciplina[] = $disci;
				}

				foreach ($turmas["msg"] as $turma) {
					$option3 = new Template("View/option3.tpl");
					$option3->set("valor", $turma->id);
					$option3->set("campo1", $turma->nome_curso);
					$option3->set("campo2", $turma->serie);
					$option3->set("campo3", $turma->modalidade);

					$opt3[] = $option3;

					$tur = new Template("View/aula_turma.tpl");
					$tur->set("cod", $turma->id);
					$tur->set("nome", $turma->nome_curso);

					$dados_turma[] = $tur;
				}	
				
				foreach($professor["msg"] as $prof) {
					
					$option = new Template("View/option.tpl");
					$option->set("valor",$prof->id);
					$option->set("campo",$prof->nome);
					$opt[] = $option;

					$profe = new Template("View/lista_professor.tpl");
					$profe->set("cod", $prof->id);
					$profe->set("nome_professor", $prof->nome);

					$busca = new Busca("aula", "id_professor = {$prof->id}");
					$aulas = $busca->model();

					$busca_disciplina = new BUsca("aula","id_disciplina = {$disc->id}");
					$aula_disc = $busca_disciplina->model();

					
					$conteudo_tabela = "";
					$conteudo_disciplina = "";
					if(!$aulas["erro"]){
						$dados_tabela = array();
						foreach ($aulas["msg"] as $aula){
							
							$tabela = new Template("View/lista_tabela_aula.tpl");

							foreach ($disciplina["msg"] as $disc) {
								$tabela->set("cod_d", $disc->id);
								$tabela->set("nome_disciplina", $disc->nome);
							}
							foreach ($turmas["msg"] as $turma) {
								$tabela->set("cod_t", $turma->id);
								$tabela->set("turma", $turma->nome_curso);
							}
							
							$tabela->set("grupo", $aula->grupo);
							$tabela->set("cod", $aula->id);
							
							$dados_tabela[]=$tabela;
						}
						$conteudo_tabela = Template::juntar($dados_tabela);
						$conteudo_disciplina = Template::juntar($dados_disciplina);
					}
					else{
						$conteudo_tabela = "";
						$retorno["msg"] = "Erro";
					}
					$profe->set("aula", $conteudo_tabela);
					$dados_professor[] = $profe;

				}
				$conteudo_prof = Template::juntar($dados_professor);
				$cabecalho->set("professor_aula", $conteudo_prof);
				
				$conteudo_disciplina = Template::juntar($dados_disciplina);
				
			}
			
			$cabecalho->set("controler", "aula");

			$conteudo_opt = Template::juntar($opt);
			$conteudo_opt2 = Template::juntar($opt2);
			$conteudo_opt3 = Template::juntar($opt3);

			$cabecalho->set("option", $conteudo_opt);
			$cabecalho->set("option2", $conteudo_opt2);
			$cabecalho->set("option3", $conteudo_opt3);

			$retorno["erro"] = false;
			$retorno["msg"] = $cabecalho->saida();
		}
		catch (Exception $e) {
			$retorno["erro"] = true;
			$retorno["msg"] = "Ocorreu um erro, entre em contato com o administrador! ";
		}
		return $retorno;
	}
}
?>