<table class="table">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Editar</th>
			<th>Remover</th>
		</tr>
	</thead>
	<tbody>
		[@tabela]
	</tbody>

</table>

<button type="button" id="addDepartamento" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#insereEdita"> 
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
						<input type="text" class="form-control" placeholder="Nome" name="nome">
				</div>
				
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		        <button type="submit" class="btn btn-primary">Salvar</button>
		      </div>  
    		</div>
   		<input type="hidden" name="id">
   	</form>
  </div>
</div>

<script type="text/javascript" src="controler/departamento.js" > </script>