jQuery("#addDepartamento").click( function (e) {
	jQuery("#insereEdita").find(".modal-title").html("Preencha os dados do Departamento! ");
	jQuery("form div").removeClass("form-group has-success").removeClass("form-group has-error");
	jQuery("form").trigger("reset");
	jQuery("form").attr("action","DepartamentoInsere");
});

function acao_edita_remove() {
	jQuery(".editar").click( function (e) {
		e.preventDefault();
		jQuery("#insereEdita").find(".modal-title").html("Altere os dados do Departamento! ");
		jQuery("form").trigger("reset");
		var id = jQuery(this).attr("cod");
		var linha = jQuery(this).parent().parent();
		jQuery("form input[name=id]").val(id);
	   jQuery("form input[name=nome]").val(linha.children("td:eq(0)").text());
	   jQuery("form").attr("action","DepartamentoAltera");
	});

	jQuery(".remover").click( function (e) {
		e.preventDefault();
		var id = jQuery(this).attr("cod");
		var linha = jQuery(this).parent().parent();
		jQuery("#sim").click( function (e) {
			jQuery.get("Class/index.php?acao=DepartamentoRemove&id="+id, function (retorno) {
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
	},
	messages: {
		nome: "Preencha o nome do Departamento",
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
			if (acao == "DepartamentoInsere") {
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
			if (acao == "DepartamentoAltera") {
				var linha = ".table tbody tr[cod="+valores[1].value+"] ";
				jQuery(linha+"td:eq(0)").text(valores[0].value);
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
