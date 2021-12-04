$(function(){
    // Aciona a validação e formatação ao sair do input
    $('#cpfcnpj').blur(function(){
        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();
        // Testa a validação e formata se estiver OK

        if (($('#cpfcnpj').val() == '00000000000') || ($('#cpfcnpj').val() == '11111111111') || ($('#cpfcnpj').val() == '22222222222') || 
        ($('#cpfcnpj').val() == '33333333333') || ($('#cpfcnpj').val() == '44444444444') || ($('#cpfcnpj').val() == '55555555555') ||
        ($('#cpfcnpj').val() == '66666666666') || ($('#cpfcnpj').val() == '77777777777') || ($('#cpfcnpj').val() == '88888888888') ||
        ($('#cpfcnpj').val() == '99999999999')){
            $("#msgerrocc").show();
            $(this).addClass(' input-error '); //Adiciona borda
            $("#btnproximo").prop("disabled", true); // DESABILITA PRÓXIMO
        }else{
            if ( formata_cpf_cnpj( cpf_cnpj ) ) {
                $(this).val( formata_cpf_cnpj( cpf_cnpj ) );
                $("#btnproximo").prop("disabled", false); // HABILITA PRÓXIMO
                $("#msgerrocc").hide();
                
            } else {
                //alert('CPF ou CNPJ inválido!');
                $("#msgerrocc").show();
                $(this).addClass(' input-error '); //Adiciona borda
                $("#btnproximo").prop("disabled", true); // DESABILITA PRÓXIMO
            }
        }
    });
});