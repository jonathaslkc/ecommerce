<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bannerinsert
 *
 * @author Jonathas
 */


if(isset($_POST['uploadimagem'])):
    if(empty($_POST['srcimg']) && !(empty($_FILES['arquivo']['name']))):
        // Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = '../web/images/uploads/';
        // Tamanho máximo do arquivo (em Bytes)
        $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
        // Array com as extensões permitidas
        $_UP['extensoes'] = array('jpg', 'png', 'gif');
        // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
        $_UP['renomeia'] = false;
        // Array com os tipos de erros de upload do PHP
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
        // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
        if ($_FILES['arquivo']['error'] != 0) :
            die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
            exit; // Para a execução do script
        endif;
        // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
        // Faz a verificação da extensão do arquivo
        $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
        if (array_search($extensao, $_UP['extensoes']) === false) :
            echo "<script>alert('Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif')</script>";
            exit;
        endif;
        // Faz a verificação do tamanho do arquivo
        if ($_UP['tamanho'] < $_FILES['arquivo']['size']) :
            echo "<script>alert('O arquivo enviado é muito grande, envie arquivos de até 2Mb.')</script>";
            exit;
        endif;
        // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
        // Primeiro verifica se deve trocar o nome do arquivo
        if ($_UP['renomeia'] == true) :
            // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
            $nome_final = md5(time()).'.jpg';
        else:
            // Mantém o nome original do arquivo
            $nome_final = $_FILES['arquivo']['name'];
        endif;

        // Depois verifica se é possível mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)):
            // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo

            ##BannerPublicidade
            $caminho_img= $_UP['pasta'].$nome_final;
            $posicao    = filter_input(INPUT_POST, "posicao", FILTER_SANITIZE_STRING);
            $loja_id    = $_SESSION['loja'];
            
            $tam        = strlen($caminho_img);
            $caminho_img= substr($caminho_img, 3, $tam);
            
            $bnnpubli->setCaminho_img($caminho_img);
            $bnnpubli->setPosicao($posicao);
            $bnnpubli->setLoja_id($loja_id);
            
            if ($bnnpubli->selectexistencia($posicao) != NULL):
                if ($bnnpubli->update($posicao)):
                    echo "<script>alert('Atualização e Upload efetuados com sucesso!')</script>";
                endif;
            else:
                if ($bnnpubli->insert()):
                    echo "<script>alert('Inserção e Upload efetuados com sucesso!')</script>";
                endif;
            endif;

        else:
            // Não foi possível fazer o upload, provavelmente a pasta está incorreta
            echo "<script>alert('Não foi possível enviar o arquivo, tente novamente')</script>";
        endif;            

    else:

        ##BannerPublicidade
        
        $caminho_img= filter_input(INPUT_POST, "srcimg", FILTER_SANITIZE_STRING);
        $posicao    = filter_input(INPUT_POST, "posicao", FILTER_SANITIZE_STRING);
        $loja_id    = $_SESSION['loja'];
        
        $tam        = strlen($caminho_img);
        $caminho_img= substr($caminho_img, 3, $tam);
        
        $bnnpubli->setCaminho_img($caminho_img);
        $bnnpubli->setPosicao($posicao);
        $bnnpubli->setLoja_id($loja_id);
        
        if (empty($caminho_img)):
            $msgreturn='ATENÇÃO<br>Favor, preencher  os campos obrigatórios! Nada foi alterado!';
            $tipo='alert';
        else:
            if ($bnnpubli->selectexistencia($posicao) != NULL):
                if ($bnnpubli->update($posicao)):
                    echo "<script>alert('Atualização efetuado com sucesso!')</script>";
                endif;
            else:
                if ($bnnpubli->insert()):
                    echo "<script>alert('Inserção realizada com sucesso!')</script>";
                endif;
            endif;
        endif;
    endif;
endif;