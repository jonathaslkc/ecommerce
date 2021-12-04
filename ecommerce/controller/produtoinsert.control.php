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
#FILE   CIfr    CIla    CIfu
#INPUT  caminho_img_frente  caminho_img_lateral caminho_img_fundo


if(isset($_POST['InserirItem'])):

    try{
        ## INÍCIO TRANSACTION ON OPERATION
        DB::getInstance()->beginTransaction();
        #######
        
        ## CAMINHO IMAGEM FRENTE
        if (empty($_POST['caminho_img_frente'])):
            if (!empty($_FILES['CIfr']['name'])):
                $_UP['pasta'] = '../web/images/uploads/itens/';
                $_UP['tamanho'] = 1024*1024; // 1Mb
                $_UP['extensoes'] = array('jpg', 'png');
                $extensao = strtolower(end(explode('.', $_FILES['CIfr']['name'])));
                if (array_search($extensao, $_UP['extensoes']) === false):
                    echo "<script>alert('Arquivo diferente de extensão JPG e nem PNG.  A imagem não foi gravada!')</script>";
                else:
                    if ($_UP['tamanho'] < $_FILES['CIfr']['size']):
                        echo "<script>alert('A imagem enviado é muito grande, somente é permitido de até 1Mb. A imagem não foi gravada!')</script>";
                    else:
                        $nome_final = md5(time()).'.jpg';
                        if (move_uploaded_file($_FILES['CIfr']['tmp_name'], $_UP['pasta'] . $nome_final)):
                            $caminho_img_frente   =   $_UP['pasta'] . $nome_final;
                            $boolmove1 = True;
                            echo '<script>alert("'.$caminho_img_frente.'")</script>';
                        endif;  
                    endif;
                endif;
            endif;
        else:
            if (!empty($_POST['caminho_img_frente'])):
                $caminho_img_frente = $_POST['caminho_img_frente'];
                $itens->setCaminho_img_frente($caminho_img_frente);
                $boolmove1 = True;
                echo '<script>alert("'.$caminho_img_frente.'")</script>';
            endif;
        endif;
        if((empty($_POST['caminho_img_frente'])) && (empty($_FILES['CIfr']['name']))):
            $boolmove1 = False;
            $caminho_img_frente = '../web/images/uploads/itens/default.jpg';
            echo '<script>alert("O Produto foi cadastrado com uma imagem padrão na #1 IMG. \nMotivos: Indiferença com os parâmetros de validação!")</script>';
        endif;
        
        ## CAMINHO IMAGEM LATERAL
        if (empty($_POST['caminho_img_lateral'])):
            if (!empty($_FILES['CIla']['name'])):
                $_UP['pasta'] = '../web/images/uploads/itens/';
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
                            $caminho_img_lateral   =   $_UP['pasta'] . $nome_final;
                            $boolmove2 = True;
                            echo '<script>alert("'.$caminho_img_lateral.'")</script>';
                        endif;  
                    endif;
                endif;
            endif;
        else:
            if (!empty($_POST['caminho_img_lateral'])):
                $caminho_img_lateral = $_POST['caminho_img_lateral'];
                $itens->setCaminho_img_lateral($caminho_img_lateral);
                $boolmove2 = True;
                echo '<script>alert("'.$caminho_img_lateral.'")</script>';
            endif;
        endif;
        if((empty($_POST['caminho_img_lateral'])) && (empty($_FILES['CIla']['name']))):
            $boolmove2 = False;
            #$caminho_img_lateral = '../web/images/uploads/itens/default.jpg';
            $caminho_img_lateral = '';
            #echo '<script>alert("O Produto foi cadastrado com uma imagem padrão na #2 IMG. \nMotivos: Indiferença com os parâmetros de validação!")</script>';
        endif;
        
        ## CAMINHO IMAGEM FUNDO
        if (empty($_POST['caminho_img_fundo'])):
            if (!empty($_FILES['CIfu']['name'])):
                $_UP['pasta'] = '../web/images/uploads/itens/';
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
                            $caminho_img_fundo   =   $_UP['pasta'] . $nome_final;
                            $boolmove3 = True;
                            echo '<script>alert("'.$caminho_img_fundo.'")</script>';
                        endif;  
                    endif;
                endif;
            endif;
        else:
            if (!empty($_POST['caminho_img_fundo'])):
                $caminho_img_fundo = $_POST['caminho_img_fundo'];
                $boolmove3 = True;
                echo '<script>alert("'.$caminho_img_fundo.'")</script>';
            endif;
        endif;
        if((empty($_POST['caminho_img_frente'])) && (empty($_FILES['CIfu']['name']))):
            $boolmove3 = False;
            #$caminho_img_fundo = '../web/images/uploads/itens/default.jpg';
            $caminho_img_fundo = '';
            #echo '<script>alert("O Produto foi cadastrado com uma imagem padrão na #3 IMG. \nMotivos: Indiferença com os parâmetros de validação!")</script>';
        endif;
        
        # Column Table PRODUTO
        $nome           = $_POST['nome'];
        $promocional    = $_POST['promocional'];
        $ativo          = $_POST['ativo'];
        $destacar_site  = $_POST['destacar_site'];
        $peso           = $_POST['peso'];
        $altura         = $_POST['altura'];
        $largura        = $_POST['largura'];
        $profundidade   = $_POST['profundidade'];
        $ncm_id         = $_POST['ncm_id'];
        $subcategoria_id= $_POST['recebeValor'];
        $categoria_id   = $_POST['passaValor'];
        $descricao      = $_POST['descricao'];

        ## Column Class PRODUTO
        $itens->setNome($nome);
        $itens->setPromocional($promocional);
        $itens->setAtivo($ativo);
        $itens->setCaminho_img_frente($caminho_img_frente);
        $itens->setCaminho_img_lateral($caminho_img_lateral);
        $itens->setCaminho_img_fundo($caminho_img_fundo);
        $itens->setDestacar_site($destacar_site);
        $itens->setPeso($peso);
        $itens->setAltura($altura);
        $itens->setLargura($largura);
        $itens->setProfundidade($profundidade);
        $itens->setNcm_id($ncm_id);
        $itens->setSubcategoria_id($subcategoria_id);
        $itens->setCategoria_id($categoria_id);
        $itens->setDescricao($descricao);
        
        ## Command Sql INSERT
        $itens->insert();
        #####################
        
        # Column Table PRECO
        $produto_id         = $itens->getUltimoid(); #Captura por GET do último ID Cadastrado - MYSQL_INSERT_ID
        $preco_venda        = filter_input(INPUT_POST, "preco_venda",       FILTER_VALIDATE_FLOAT);
        $preco_compra       = filter_input(INPUT_POST, "preco_compra",      FILTER_VALIDATE_FLOAT);
        $preco_promocional  = filter_input(INPUT_POST, "preco_promocional", FILTER_VALIDATE_FLOAT);
        $preco_custo        = filter_input(INPUT_POST, "preco_custo",       FILTER_VALIDATE_FLOAT);
        $desconto           = filter_input(INPUT_POST, "desconto",          FILTER_VALIDATE_FLOAT);
        
        ## Column Class PRECO
        $preco->setProduto_id($produto_id);
        $preco->setPreco_venda($preco_venda);
        $preco->setPreco_compra($preco_compra);
        $preco->setPreco_promocional($preco_promocional);
        $preco->setPreco_custo($preco_custo);
        $preco->setDesconto($desconto);
        
        ## Command Sql INSERT
        $preco->insert();
        #####################
        
        # Column Table CODBARRA
        $codbarra_id    = $_POST['codbarra_id'];
        //$produto_id         = $itens->getUltimoid(); #Captura por GET do último ID Cadastrado - MYSQL_INSERT_ID
        $fornecedor_id  = $_POST['fornecedor_id'];
        $marca          = $_POST['marca'];
        $tamanho        = $_POST['tamanho'];
        $modelo         = $_POST['modelo'];
        $cor            = $_POST['cor'];

        ## Column Class CODBARRA
        $barra->setCodbarra_id($codbarra_id);
        $barra->setProduto_id($produto_id);
        $barra->setFornecedor_id($fornecedor_id);
        $barra->setMarca($marca);
        $barra->setTamanho($tamanho);
        $barra->setModelo($modelo);
        $barra->setCor($cor);
        
        ## Command Sql INSERT
        $barra->insert();
        #####################
        
        ## COMMIT ON TRANSACTION
        DB::getInstance()->commit();
        #######
        
        $msgreturn='Sucesso!<br>O Produto foi cadastrado com êxito!';
        $tipo='success';
        return true;
    } catch (Exception $e) {
        
        ## ROLLBACK ON TRANSACTION
        DB::getInstance()->rollBack();
        #######
        
        $msgreturn='Atenção!<br>Não foi possível prosseguir com o pedido... Nada foi alterado!';
        $tipo='alert';
        echo $e->getMessage();
        return false;
    }
endif;