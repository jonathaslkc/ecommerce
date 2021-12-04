<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produto
 *
 * @author Jonathas
 */
///////////////////////////////////UPDATE - ATIVA DESATIVA CADASTRO //////////////////////////////////////////////////
if(isset($_GET['acaoativaprod']) && $_GET['acaoativaprod'] == 'altera'): //Ação de deletar
    $id = $_GET['id'];
    if ($itens->alteraativoa($id)):
        header('location: listagem-itens.php');
    endif;
endif;
    
if(isset($_GET['acaodesativaprod']) && $_GET['acaodesativaprod'] == 'altera'): //Ação de deletar
    $id = $_GET['id'];
    if ($itens->alteraativod($id)):
        header('location: listagem-itens.php');
    endif;
endif;


///////////////////////////////////UPDATE - ATUALIZAÇÃO MAIS INFORMAÇÕES //////////////////////////////////////////////////    
if(isset($_POST['altMaisInfo'])):
        $id = $_GET['id'];

        # Column Table PRODUTO
        $promocional    = $_POST['promocional'];
        $ativo          = $_POST['ativo'];
        $destacar_site  = $_POST['destacar_site'];

        ## Column Class PRODUTO
        $itens->setPromocional($promocional);
        $itens->setAtivo($ativo);
        $itens->setDestacar_site($destacar_site);

    try {
        $itens->updateMaisInfo($id);
        $msgreturn='Sucesso!<br>Informações atualizada com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;

///////////////////////////////////UPDATE - ATUALIZAÇÃO CÓDIGO DE BARRAS //////////////////////////////////////////////////    
if(isset($_POST['altCodBarras'])):
    $id = $_GET['id'];

    # Column Table CODBARRA
    $codbarra_id    = $_POST['codbarra_id'];
    if (isset($_POST['fornecedor_id'])):
        $fornecedor_id = $_POST['fornecedor_id'];
    else:
        $fornecedor_id = $_POST['normalForn'];
    endif;
    ## Column Class CODBARRA
    $barra->setCodbarra_id($codbarra_id);
    $barra->setFornecedor_id($fornecedor_id);
    
    try {
        $barra->updateCodBar($id);
        $msgreturn='Sucesso!<br>Informações atualizada com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;

///////////////////////////////////UPDATE - ATUALIZAÇÃO PESO E DIMENSÃO //////////////////////////////////////////////////    
if(isset($_POST['altPesDim'])):
    $id = $_GET['id'];

    # Column Table PRODUTO
    $peso           = $_POST['peso'];
    $altura         = $_POST['altura'];
    $largura        = $_POST['largura'];
    $profundidade   = $_POST['profundidade'];
    ## Column Class PRODUTO
    $itens->setPeso($peso);
    $itens->setAltura($altura);
    $itens->setLargura($largura);
    $itens->setProfundidade($profundidade);
    
    try {
        $itens->updatePesoDim($id);
        $msgreturn='Sucesso!<br>Informações atualizada com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;

///////////////////////////////////UPDATE - ATUALIZAÇÃO CUSTO E PREÇO //////////////////////////////////////////////////    
if(isset($_POST['altCusPre'])):
    $id = $_GET['id'];

    # Column Table PRECO
    $preco_venda        = filter_input(INPUT_POST, "preco_venda",       FILTER_VALIDATE_FLOAT);
    $preco_compra       = filter_input(INPUT_POST, "preco_compra",      FILTER_VALIDATE_FLOAT);
    $preco_promocional  = filter_input(INPUT_POST, "preco_promocional", FILTER_VALIDATE_FLOAT);
    $preco_custo        = filter_input(INPUT_POST, "preco_custo",       FILTER_VALIDATE_FLOAT);
    $desconto           = filter_input(INPUT_POST, "desconto",          FILTER_VALIDATE_FLOAT);
    ## Column Class PRECO
    $preco->setPreco_venda($preco_venda);
    $preco->setPreco_compra($preco_compra);
    $preco->setPreco_promocional($preco_promocional);
    $preco->setPreco_custo($preco_custo);
    $preco->setDesconto($desconto);
    
    try {
        $preco->updatePrecoCusto($id);
        $msgreturn='Sucesso!<br>Informações atualizada com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;

///////////////////////////////////UPDATE - ATUALIZAÇÃO IMAGEM //////////////////////////////////////////////////    
if(isset($_POST['altImgCom'])):
    $id = $_GET['id'];

    ## CAMINHO IMAGEM FRENTE
        if(isset($_POST["caminhoImgPadraoFrente"])):
            if($_POST['caminhoImgPadraoFrente']):
                $caminho_img_frente = 'web/images/uploads/itens/default.jpg';
            endif;
        else:
            $boolyesno = FALSE;
            if (empty($_POST['caminho_img_frente'])):
                if (!empty($_FILES['CIfr']['name'])):
                    $_UP['pasta'] = '../web/images/uploads/itens/';
                    $_UP['pasta2'] = 'web/images/uploads/itens/';
                    $_UP['tamanho'] = 1024*1024; // 1Mb
                    $_UP['extensoes'] = array('jpg', 'png');
                    $extensao = strtolower(end(explode('.', $_FILES['CIfr']['name'])));
                    if (array_search($extensao, $_UP['extensoes']) === false):
                        echo "<script>alert('Arquivo diferente de extensão JPG ou PNG.  A imagem não foi gravada!')</script>";
                    else:
                        if ($_UP['tamanho'] < $_FILES['CIfr']['size']):
                            echo "<script>alert('A imagem enviado é muito grande, somente é permitido até 1Mb. A imagem não foi gravada!')</script>";
                        else:
                            $nome_final = md5(time()).'.jpg';
                            if (move_uploaded_file($_FILES['CIfr']['tmp_name'], $_UP['pasta'] . $nome_final)):
                                $caminho_img_frente   =   $_UP['pasta2'] . $nome_final;
                                $boolyesno = TRUE;
                            endif;  
                        endif;
                    endif;
                endif;
            else:
                if (!empty($_POST['caminho_img_frente'])):
                    $caminho_img_frente = $_POST['caminho_img_frente'];
                    $tam                = strlen($caminho_img_frente);
                    $caminho_img_frente = substr($caminho_img_frente, 3, $tam);
                    $boolyesno = TRUE;
                endif;
            endif;
            if((empty($_POST['caminho_img_frente'])) && (empty($_FILES['CIfr']['name']))):
                $caminho_img_frente = $_POST['caminho_img_frenteOrig'];
                $boolyesno = TRUE;
                #echo '<script>alert("O Produto foi cadastrado com uma imagem padrão na #1 IMG. \nMotivos: Indiferença com os parâmetros de validação!")</script>';
            endif;
            if(!$boolyesno):
                $caminho_img_frente = $_POST['caminho_img_frenteOrig'];
            endif;
        endif;
        
        ## CAMINHO IMAGEM LATERAL
        if(isset($_POST["caminhoImgPadraoLateral"])):
            if($_POST['caminhoImgPadraoLateral']):
                $caminho_img_lateral = 'web/images/uploads/itens/default.jpg';
            endif;
        else:
            $boolyesno = FALSE;
            if (empty($_POST['caminho_img_lateral'])):
                if (!empty($_FILES['CIla']['name'])):
                    $_UP['pasta'] = '../web/images/uploads/itens/';
                    $_UP['pasta2'] = 'web/images/uploads/itens/';
                    $_UP['tamanho'] = 1024*1024; // 1Mb
                    $_UP['extensoes'] = array('jpg', 'png');
                    $extensao = strtolower(end(explode('.', $_FILES['CIla']['name'])));
                    if (array_search($extensao, $_UP['extensoes']) === false):
                        echo "<script>alert('Arquivo diferente de extensão JPG e nem PNG.  A imagem não foi gravada!')</script>";
                    else:
                        if ($_UP['tamanho'] < $_FILES['CIla']['size']):
                            echo "<script>alert('A imagem enviado é muito grande, somente é permitido de até 1Mb. A imagem não foi gravada!')</script>";
                        else:
                            $nome_final = md5(time()).'.jpg';
                            if (move_uploaded_file($_FILES['CIla']['tmp_name'], $_UP['pasta'] . $nome_final)):
                                $caminho_img_lateral   =   $_UP['pasta2'] . $nome_final;
                                $boolyesno = TRUE;
                            endif;  
                        endif;
                    endif;
                endif;
            else:
                if (!empty($_POST['caminho_img_lateral'])):
                    $caminho_img_lateral    = $_POST['caminho_img_lateral'];
                    $tam                    = strlen($caminho_img_frente);
                    $caminho_img_lateral    = substr($caminho_img_lateral, 3, $tam);
                    $boolyesno = TRUE;
                endif;
            endif;
            if((empty($_POST['caminho_img_lateral'])) && (empty($_FILES['CIla']['name']))):
                $caminho_img_lateral = $_POST['caminho_img_lateralOrig'];
                $boolyesno = TRUE;
                #$caminho_img_lateral = '';
                #echo '<script>alert("O Produto foi cadastrado com uma imagem padrão na #2 IMG. \nMotivos: Indiferença com os parâmetros de validação!")</script>';
            endif;
            if(!$boolyesno):
                $caminho_img_lateral = $_POST['caminho_img_lateralOrig'];
            endif;
        endif;
        
        ## CAMINHO IMAGEM FUNDO
        if(isset($_POST["caminhoImgPadraoFundo"])):
            if($_POST['caminhoImgPadraoFundo']):
                $caminho_img_fundo = 'web/images/uploads/itens/default.jpg';
            endif;
        else:
            $boolyesno = FALSE;
            if (empty($_POST['caminho_img_fundo'])):
                if (!empty($_FILES['CIfu']['name'])):
                    $_UP['pasta'] = '../web/images/uploads/itens/';
                    $_UP['pasta2'] = 'web/images/uploads/itens/';
                    $_UP['tamanho'] = 1024*1024; // 1Mb
                    $_UP['extensoes'] = array('jpg', 'png');
                    $extensao = strtolower(end(explode('.', $_FILES['CIfu']['name'])));
                    if (array_search($extensao, $_UP['extensoes']) === false):
                        echo "<script>alert('Arquivo diferente de extensão JPG e nem PNG.  A imagem não foi gravada!')</script>";
                    else:
                        if ($_UP['tamanho'] < $_FILES['CIfu']['size']):
                            echo "<script>alert('A imagem enviado é muito grande, somente é permitido de até 1Mb. A imagem não foi gravada!')</script>";
                        else:
                            $nome_final = md5(time()).'.jpg';
                            if (move_uploaded_file($_FILES['CIfu']['tmp_name'], $_UP['pasta'] . $nome_final)):
                                $caminho_img_fundo   =   $_UP['pasta2'] . $nome_final;
                                $boolyesno = TRUE;
                            endif;
                        endif;
                    endif;
                endif;
            else:
                $caminho_img_fundo      = $_POST['caminho_img_fundo'];
                $tam                    = strlen($caminho_img_fundo);
                $caminho_img_fundo      = substr($caminho_img_fundo, 3, $tam);
                $boolyesno = TRUE;
            endif;
            if((empty($_POST['caminho_img_frente'])) && (empty($_FILES['CIfu']['name']))):
                $caminho_img_fundo = $_POST['caminho_img_fundoOrig'];
                $boolyesno = TRUE;
                #$caminho_img_fundo = '';
                #echo '<script>alert("O Produto foi cadastrado com uma imagem padrão na #3 IMG. \nMotivos: Indiferença com os parâmetros de validação!")</script>';
            endif;
            if(!$boolyesno):
                $caminho_img_fundo = $_POST['caminho_img_fundoOrig'];
            endif;
        endif;
        
        # Column Table PRODUTO
        ## Column Class PRODUTO
        $itens->setCaminho_img_frente($caminho_img_frente);
        $itens->setCaminho_img_lateral($caminho_img_lateral);
        $itens->setCaminho_img_fundo($caminho_img_fundo);
    
    try {
        $itens->updateCaminhoImg($id);
        $msgreturn='Sucesso!<br>Imagens atualizadas com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;

///////////////////////////////////UPDATE - CADASTRO INFORMAÇÕES GERAIS //////////////////////////////////////////////////    
if(isset($_POST['altInfoGerais'])):
    $id = $_GET['id'];

    # Column Table PRODUTO
    $nome           = $_POST['nome'];
    if (isset($_POST['ncm_id'])):
        $ncm_id= $_POST['ncm_id'];
    else:
        $ncm_id = $_POST['normalNCM'];
    endif;
    if ($_POST['recebeValor'] > 0):
        $subcategoria_id= $_POST['recebeValor'];    
    else:
        $subcategoria_id = $_POST['normalSubC'];
    endif;
    if ($_POST['passaValor'] > 0):
        $categoria_id= $_POST['passaValor'];
    else:
        $categoria_id = $_POST['normalCat'];
    endif;
    $descricao      = $_POST['descricao'];
    ## Column Class PRODUTO
    $itens->setNome($nome);
    $itens->setNcm_id($ncm_id);
    $itens->setSubcategoria_id($subcategoria_id);
    $itens->setCategoria_id($categoria_id);
    $itens->setDescricao($descricao);
    
    try {
        $itens->updateInfoGer($id);
        $msgreturn='Sucesso!<br>Informações Gerais alteradas com êxito!';
        $tipo='success';
    }catch(PDOException $e){
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
    }
endif;