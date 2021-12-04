<?php
    //Captura o Perfil do usuário
    $acao = $perfil->find($_SESSION['tipousuario']);
    
    if ($_SESSION['logadoadm']):
        //Verifica a condição Logado e se têm Permissão suficiente
        if(($_SESSION['logado']) && ($acao->acao === '1,2,3,4,5')):

        else:
            header('location: acessonegado.php');
        endif;
    else:
        header('location: acessonegado.php');
    endif;