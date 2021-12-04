<?php

function calcular_frete($cep_origem,
        $cep_destino,
        $peso,
        $valor,
        $tipo_do_frete,
        $altura,
        $largura,
        $comprimento){
    
    $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
    $url .= "nCdEmpresa=";
    $url .= "&sDsSenha=";
    $url .= "&sCepOrigem=" . $cep_origem;
    $url .= "&sCepDestino=" . $cep_destino;
    $url .= "&nVlPeso=" . $peso;
    $url .= "&nVlLargura=" . $largura;
    $url .= "&nVlAltura=" . $altura;
    $url .= "&nCdFormato=1";
    $url .= "&nVlComprimento=" . $comprimento;
    $url .= "&sCdMaoPropria=n";
    $url .= "&nVlValorDeclarado=" . $valor;
    $url .= "&sCdAvisoRecebimento=n";
    $url .= "&nCdServico=" . $tipo_do_frete;
    $url .= "&nVlDiametro=0";
    $url .= "&StrRetorno=xml";
    
    //Sedex: 40010;
    //PAC  : 41106;
    
    $xml = simplexml_load_file($url);
    
    return $xml->cServico;
}




//echo '<h1>Bem Vindo ao Sistema Correios de Calculo de Frete</h1>';
//echo '<br><br>';
//
//$val = (calcular_frete('49030210','49985000', 1, 1000,'41106'));
//echo 'Valor PAC: R$ '.$val->Valor.'<br>';
//echo 'Prazo: '.$val->PrazoEntrega.' Dias<br>';