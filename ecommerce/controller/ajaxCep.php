<?php 

require_once ('../controller/funcaoCalcFrete.php');

$cep = $_POST["id"];

$cep_destino    = $cep;
$cep_origem     = '49985000';
$valor          = 17.00;
$tipo_entregaPC = "41106";
$tipo_entregaSD = "40010";
$peso           = 1;

if ($cep):
    
    $valPC = (calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entregaPC));
    $valSD = (calcular_frete($cep_origem,$cep_destino,$peso,$valor,$tipo_entregaSD));

    if ($valSD->Valor == '0,00'):
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
                    <b> R$ '.$valPC->Valor.'</b>
                </p>
                <p>
                    Prazo:
                    <b>'.$valPC->PrazoEntrega.'</b>
                </p>
            </div>
        ');
        echo ('
            
            <div class="col-sm-5">
                <h5> --- SEDEX --- </h5>
                <p>
                    Frete:
                    <b> R$ '.$valSD->Valor.'</b>
                </p>
                <p>
                    Prazo:
                    <b>'.$valSD->PrazoEntrega.'</b>
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