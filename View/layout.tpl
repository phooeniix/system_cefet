<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistema</title>
		<link rel="stylesheet" type="text/css" href="View/estilo.css" media="all">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="all">
		<script type="text/javascript" src="js/jquery-1.11.1.min.js" ></script>
		<script type="text/javascript" src="jquery-validation-1.13.1/dist/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js" ></script>
	</head>
	<body>

	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    	<div class="container">
        	<div class="navbar-header">
          		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            		<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          		<a class="navbar-brand" href="#">Aqui vai uma Imagem</a>
        	</div>
        	<div id="navbar" class="navbar-collapse collapse">
          		<ul class="nav navbar-nav">
            		<li><a href="index.php">Home</a></li>
            		<li class="dropdown">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configure<span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="?acao=Departamento">Departamento</a></li>
				            <li><a href="?acao=Disciplina">Disiciplina</a></li>
				            <li><a href="?acao=Professor">Professores</a></li>
				            <li><a href="?acao=Turma">Turmas</a></li>
				            <li><a href="?acao=Aulas">Aulas</a></li>
				            <li><a href="?acao=Disponibilidade"> Disponibilidade </a></li>
		              	</ul>
            		</li>
            		<li><a href="?acao=horario">Horário</a></li>
          		</ul>
        	</div><!--/.nav-collapse -->
    	</div>
    </div>

 	<div class="container">
       <div class="conteudo">
			[@conteudo]
       </div>
  </div>
	</body>
</html>
		<!-- Formulário para Status -->
<div class="modal fade" id="status">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">
		        	<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
		        </button>
		        <h4 class="modal-title">Modal title</h4>
		    </div>
			<div class="modal-body">
		        <p>One fine body&hellip;</p>
		    </div>
		    <div class="modal-footer">
		    	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		    </div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

		<!-- Formulário para Confirmação -->
		<div class="modal fade" id="confirma">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Confirma</h4>
		      </div>
			      <div class="modal-body">
			      	<p> Deseja apagar o registro selecionado? </p>
					</div>
			      <div class="modal-footer">
						<a type="button" class="btn btn-danger" id="sim">Sim</a>
			      	<a type="button" class="btn btn-primary" data-dismiss="modal">N&atilde;o</a>
			      </div>
		    </div>
		  </div>
		</div>
