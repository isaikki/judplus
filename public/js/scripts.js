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
function valCpf(cpf){
	digitoA = 0;
	digitoB = 0;
	for(i = 0, x = 10; i <= 8; i++, x--){
		digitoA += cpf[i] * x;
	}
	for(i = 0, x = 11; i <= 9; i++, x--){
		digitoB += cpf[i] * x;
	}
	somaA = ((digitoA%11) < 2 ) ? 0 : 11-(digitoA%11);
	somaB = ((digitoB%11) < 2 ) ? 0 : 11-(digitoB%11);
	if(somaA != cpf[9] || somaB != cpf[10]){
		return false;
	}else{
		return true;
	}
}
function valCnpj(cnpj){
	var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
	var dig1= new Number;
	var dig2= new Number;
	
	var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

	for(i = 0; i<valida.length; i++){
			dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
			dig2 += cnpj.charAt(i)*valida[i];       
	}
	dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
	dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

	if(((dig1*10)+dig2) == digito){
		return true;
	}
	return false;
}
$(document).ready(function(){
	//Chamadas
	redimensiona();
	alteraTipoPessoa();
	$('.dataForm').datepicker({
		format: "yyyy/mm/dd",
        language: "pt-BR"
	});
	$('#cep').mask('99999-999');
	
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
			}else{
				if(!valCpf(cpf_cnpj)){
					$(this).val('');
					alert('CPF Inválido');
				}
			}
		}else if(tipo == 1){
			if(cpf_cnpj.length != 14){
				$(this).val('');
			}else{
				if(!valCnpj(cpf_cnpj)){
					$(this).val('');
					alert('CNPJ Inválido');
				}
			}
		}
	});
	$('#cep').cep(function(endereco) {
		$('#endereco').val(endereco.logradouro);
		$('#bairro').val(endereco.bairro);
		//$('#cidade').val(endereco.cidade);
		//$('#uf').val(endereco.uf);
	});
});