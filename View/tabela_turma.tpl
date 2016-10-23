<table class="table">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Série</th>
			<th>Modalidade</th>
			<th>Ano</th>
			<th>Editar</th>
			<th>Remover</th>

		</tr>
	</thead>
	<tbody>
		[@tabela]
	</tbody>
</table>

<button type="button" id="addTurma" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#insereEdita"> 
	<span class="glyphicon glyphicon-plus-sign"></span>
 	Adicionar 
</button>

<div class="modal fade" id="insereEdita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
        	<span aria-hidden="true">&times;</span>
        	<span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form method="post" action="#">
	      <div class="modal-body">
	        <div class="input-group">
				  <span class="input-group-addon">Nome</span>
				  <input type="text" class="form-control" placeholder="Nome do Curso" name="nome_curso">
			</div>
			<div class="input-group">
				  <span class="input-group-addon">Série</span>
				  <input type="text" class="form-control" placeholder="Série" name="serie">
			</div>
			<div class="input-group">
				  <span class="input-group-addon">Modalidade</span>
				  <input type="text" class="form-control" placeholder="Modalidade" name="modalidade">
			</div>
			<div class="input-group">
				  <span class="input-group-addon">Ano</span>
				  <input type="text" class="form-control" placeholder="Ano" name="ano">
			</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="submit" class="btn btn-primary">Salvar</button>
	      </div>
	      <input type="hidden" name="id">
	 	</form>
    </div>
  </div>
</div>

<script type="text/javascript" src="controler/turma.js"></script>