jQuery("#addTurma").click( function (e) {
	jQuery("#insereEdita").find(".modal-title").html("Preencha os dados da Turma! ");
	jQuery("form div").removeClass("form-group has-success").removeClass("form-group has-error");
	jQuery("form").trigger("reset");
	jQuery("form").attr("action","TurmaInsere");
});

function acao_edita_remove() {
	jQuery(".editar").click( function (e) {
		e.preventDefault();
		jQuery("#insereEdita").find(".modal-title").html("Altere os dados da Disciplina! ");
		jQuery("form").trigger("reset");
		var id = jQuery(this).attr("cod");
		var linha = jQuery(this).parent().parent();
		jQuery("form input[name=id]").val(id);
	   jQuery("form input[name=nome_curso]").val(linha.children("td:eq(0)").text());
	   jQuery("form input[name=serie]").val(linha.children("td:eq(1)").text());
	   jQuery("form input[name=modalidade]").val(linha.children("td:eq(2)").text());
	   jQuery("form input[name=ano]").val(linha.children("td:eq(3)").text());
	   jQuery("form").attr("action","TurmaAltera");
	});
	
	jQuery(".remover").click( function (e) {
		e.preventDefault();
		var id = jQuery(this).attr("cod");
		var linha = jQuery(this).parent().parent();
		jQuery("#sim").click( function (e) {
			jQuery.get("Class/index.php?acao=TurmaRemove&id="+id, function (retorno) {
				var retorno = JSON.parse(retorno);
				if(!retorno.erro)
				{
					jQuery("#status .modal-title").html("Sucesso");
					linha.remove();
				}
				else
				{
					jQuery("#status .modal-title").html("Erro");
				}
				jQuery("#status .modal-body").html(retorno.msg);
				jQuery("#confirma").modal("hide");
				jQuery("#status").modal("show");
			});
		});
	});
}
jQuery("form").validate({
	rules:{
		nome:"required",
		serie:"required",
		modalidade:"required",
		ano:"required",
	},
	messages: {
		nome: "Preencha o nome da Turma!",
		serie: "Preencha a série corretamente!",
		modalidade: "Preencha a modalidade corretamente!",
		ano: "Preencha o ano corretamente!",
	},
	errorClass:"form-group has-error",
	validClass:"form-group has-success",
	highlight: function(element, errorClass, validClass){
		jQuery(element).parent().removeClass(validClass).addClass(errorClass);
	},
	unhighlight: function (element, errorClass, validClass){
		jQuery(element).parent().removeClass(errorClass).addClass(validClass);	
	}
});
acao_edita_remove();
jQuery("form").submit( function (e) {
	var dados = jQuery("form").serialize();
	var acao = jQuery("form").attr("action");
	jQuery.post("Class/index.php?acao="+acao, dados, function (retorno) { 
		var retorno = JSON.parse(retorno);
		if (!retorno.erro) {
			jQuery("#status").find(".modal-title").html("Sucesso");
			var valores = jQuery("form").serializeArray();
			if (acao == "TurmaInsere") {
				var linha = "<tr cod="+retorno.id+">";
				jQuery.each(valores, function (indice, valor) {
					if(valor.name != "id") {
						linha += "<td>"+valor.value+"</td>";
					}
				});
				linha += 
					"<td>  "+
						"<button type='button' class='btn btn-info editar' data-toggle='modal' data-target='#insereEdita' cod='"+retorno.id+"'>"+
							"<span class='glyphicon glyphicon-pencil'></span>"+
						"</button>"+
					"</td>"+
					"<td>"+
						"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#confirma' cod='"+retorno.id+"'>"+
							"<span class='glyphicon glyphicon-trash remover'></span>"+
						"</button>"+
					"</td>";
				var tabela = jQuery(".table tbody");
				tabela.append(linha);
				acao_edita_remove();
			}
			if (acao == "TurmaAltera") {
				var linha = ".table tbody tr[cod="+valores[4].value+"] "; 
				jQuery(linha+"td:eq(0)").text(valores[0].value);
				jQuery(linha+"td:eq(1)").text(valores[1].value);
				jQuery(linha+"td:eq(2)").text(valores[2].value);
				jQuery(linha+"td:eq(3)").text(valores[3].value);
			}
		}
		else {
			jQuery("#status").find(".modal-title").html("Erro");
		}
		jQuery("#status").find(".modal-body").html(retorno.msg);
		jQuery("#insereEdita").modal("hide");
		jQuery("#status").modal("show");
	});
	
	return false;
});