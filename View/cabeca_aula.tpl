[@professor_aula]

<button type="button" id="addAula" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#insereEdita">
	<span class="glyphicon glyphicon-plus-sign"></span>
 	Adicionar
</button>

<div class="modal fade" id="insereEdita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">
        			<span aria-hidden="true">&times;</span>
        			<span class="sr-only">Close</span>
        		</button>
        		<h4 class="modal-title" id="myModalLabel">Modal title</h4>
      		</div>
      		<form method="post" action="#">
	      		<div class="modal-body">
	        		<div class="input-group">
						<span class="input-group-addon">Professor</span>
				  		<select name="id_professor" class="form-control">
				  			<option></option>
				  				[@option]
				  		</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Disciplina</span>
				  		<select name="id_disciplina" class="form-control">
				  			<option></option>
				  				[@option2]
				  		</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Turma</span>
				  		<select name="id_turma" class="form-control">
				  			<option></option>
				  				[@option3]
				  		</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Grupo</span>
						<select name="grupo" class="form-control">
							<option value='0'> Selecione uma opção</option>
							<option value='G1'>G1</option>
							<option value='G2'>G2</option>
							<option value='all'>TODOS</option>
						</select>
					</div>
	      			<div class="modal-footer">
	       				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	       	 			<button type="submit" class="btn btn-primary">Salvar</button>
	      			</div>
	      			<input type="hidden" name="id">
	      		</div>
	 		</form>
    	</div>
  	</div>
</div>
<script type-"text/javascript" src="controler/[@controler].js"></script>
