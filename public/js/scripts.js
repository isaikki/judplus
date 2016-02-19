function redimensiona(){
	altura=$(window).height();
	largura=$(window).width();
	telaLateral=altura-50;
	
	if(telaLateral>550){
		$('.barraLateral').height(telaLateral);
	}
}
function alteraTipoPessoa(){
	if($('#tipoPessoa option:selected').val()=='0'){
		$('#cpf_cnpj').mask('999.999.999-99'); 		//11
	}else if($('#tipoPessoa option:selected').val()=='1'){
		$('#cpf_cnpj').mask('99.999.999/9999-99'); 	//14
	}
}
$(document).ready(function(){
	//Chamadas
	redimensiona();
	alteraTipoPessoa();
	
	//Eventos
	$(window).resize(function(){
		redimensiona();
	});
	$('#tipoPessoa').change(function(){
		alteraTipoPessoa();
	});
	$('#cpf_cnpj').blur(function(){
		tipo = $('#tipoPessoa option:selected').val();
		cpf_cnpj = $(this).val();
		
		//Retirar sinais do número
		cpf_cnpj = cpf_cnpj.replace(/\./g,'');
		cpf_cnpj = cpf_cnpj.replace(/\-/g,'');
		cpf_cnpj = cpf_cnpj.replace(/\//g,'');
		
		//Testar tamanho e validação
		if(tipo == 0){
			if(cpf_cnpj.length != 11){
				$(this).val('');
			}
		}else if(tipo == 1){
			if(cpf_cnpj.length != 14){
				$(this).val('');
			}
		}
	});
});