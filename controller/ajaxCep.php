<?php 

require_once ('../controller/funcaoCalcFrete.php');

if(!isset($_SESSION)) { session_start(); }                                      // -------------------------------- INÍCIAR SESSÃO

$cep = $_POST["id"];

$valSDValor = 0;
$valPCValor = 0;

$cep_destino    = $cep;
$cep_origem     = '04023000';
$tipo_entregaPC = "41106";
$tipo_entregaSD = "40010";


#(C x L x A)/6.000*
#print_r($_SESSION['item']);

foreach($_SESSION['item'] as $list):
    #echo '<br>ID '.$list[0].'<br>';
    #echo 'NOME '.$list[1].'<br>';
    #echo 'QTD '.$list[2].'<br>';
    #echo 'PREÇO '.$list[3].'<br>';
    #echo 'PESO '.$list[4].'<br>';
    #echo 'ALTURA '.$list[5].'<br>';
    #echo 'LARGURA '.$list[6].'<br>';
    #echo 'PROFUND. '.$list[7].'<br>';
    #$PesoCub = ($list[7]*$list[6]*$list[5])/6000;
    #echo 'PESO CÚBICO = '.$PesoCub.'<br>';
    
    if($list[3] <= 17):
        #echo '<br>Valor abaixo do aceitável para cálculo! '.$list[3].'<br>';
        $list[3] = 17.00;
        #echo '<br>Valor atualizado para '.$list[3].'<br>';
    else:
        #echo '<br>V '.$list[3].'<br>';
    endif;
    $valor          = $list[3];
    $peso           = $list[4];
    $altura         = $list[5];
    $largura        = $list[6];
    $comprimento    = $list[7];
    
    $valPC = (calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entregaPC,$altura,$largura,$comprimento));
    $valSD = (calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entregaSD,$altura,$largura,$comprimento));
    #echo 'VALOR SEDEX = '.$valSD->Valor.'<br>';
    #echo 'VALOR PAC . = '.$valPC->Valor.'<br>';
    
    #echo str_replace(',', '.', $valSD->Valor); // troca a vírgula por ponto
    $valSDValor       = ($valSDValor + ((str_replace(',', '.', $valSD->Valor)) * $list[2]));
    $valPCValor       = ($valPCValor + ((str_replace(',', '.', $valPC->Valor)) * $list[2]));
    
endforeach;


if(empty($_SESSION['item'])):
    echo '
        <div class="col-sm-12">
            <h5> Impossível calcular!<br>Seu carrinho está vazio! :( </h5>
        </div>
    ';
else:
    if ($cep):



        if ($valSDValor == '0,00'):

            echo '
                <div class="col-sm-12">
                    <h5> Digite um CEP válido! </h5>
                </div>
            ';

        else:

            echo ('
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <h5> --- PAC --- </h5>
                    <p>
                        Frete:
                        <b> R$ '.$valPCValor.'</b>
                    </p>
                    <p>
                        Prazo:
                        <b> Em média '.($valPC->PrazoEntrega+3).' dia(s)</b>
                    </p>
                </div>
            ');
            echo ('

                <div class="col-sm-5">
                    <h5> --- SEDEX --- </h5>
                    <p>
                        Frete:
                        <b> R$ '.$valSDValor.'</b>
                    </p>
                    <p>
                        Prazo:
                        <b> Em média '.$valSD->PrazoEntrega.' dia(s)</b>
                    </p>
                </div>
                <div class="col-sm-1"></div>
            ');

        endif;
    else:
        echo'
            <div class="col-sm-12">
                <h5> Digite um CEP válido! </h5>
            </div>
        ';
    endif;
endif;