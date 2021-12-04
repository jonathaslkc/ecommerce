<?php
    
    if (($url_atual == 'http://localhost/ecommerce/index.php') || ($url_atual == 'http://localhost/ecommerce/') || ($url_atual == 'http://localhost/ecommerce')):
        function __autoload($class_name){                                               // -------------------------------- CARREGAR [FUNÇÕES/MÉTODOS] CLASSE USADA
            require_once 'model/' . $class_name . '.class.php';
        }
    else:
        function __autoload($class_name){                                               // -------------------------------- CARREGAR [FUNÇÕES/MÉTODOS] CLASSE USADA
            require_once '../model/' . $class_name . '.class.php';                      // -------------------------------- CARREGAR OUTRAS FUNÇÕES/MÉTODOS
        }
    endif;
        
    
    $funcionario        = new funcionario();
    $fornecedor         = new fornecedor();
    $cliente            = new cliente();
    $estado             = new estado();
    $cidade             = new cidade();
    $endereco           = new endereco();
    #$cidadesAJX         = new cidades();
    #$estadosAJX         = new estados();
    $bnnpubli           = new banner();
    $slider             = new slider();
    $categoria          = new categoria();
    $subcategoria       = new sub_categoria();
    $itens              = new produto();
    $barra              = new codbarra();
    $ncm                = new ncm();
    $preco              = new preco();
    $ecommerce          = new ecommerce();
    $tipo_pagto         = new tipo_pagto();
    $perfil             = new perfil();
    
    ///////////////////////////////////MODAL PARA LOGAR USUARIO//////////////////////////////////////////////////
    if(isset($_POST['logar'])):
        
        $username  = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
        $password  = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);

        $funcionario->setUsername($username);
        $funcionario->setPassword($password);

        if (($_POST['login'] == '') AND ($_POST['senha'] == '')):
            $msgreturn='Senhor Usuário<br>Preencha todos os campos obrigatórios!';
            $tipo='alert';
        else:
            if($funcionario->selectestado($username) != NULL):
                $msgreturn='ATENÇÃO<br>Funcionário aguardando aprovação do Administrador!';
                $tipo='alert';
            else:
                if($funcionario->logar($username, $password)):
                    #$_SESSION['nomeusuario'] = $_POST['login'];
                    #header("location: logaremp.php");
                    header('location: administrativo.php');
                else:
                    $msgreturn='Erro<br> Login/Senha incorreto!';
                    $tipo='error';
                endif;
            endif;
        endif;  
    endif;
    
    if(isset($_POST['acessar'])):
        
        $email  = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
        $senha  = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);

        $cliente->setEmail($email);
        $cliente->setSenha($senha);

        if (($_POST['email'] == '') AND ($_POST['senha'] == '')):
            $msgreturn='Senhor Usuário<br>Por favor, preencha todos os campos obrigatórios!';
            $tipo='alert';
        else:
            if($cliente->selectestado($email) != NULL):
                $msgreturn='ATENÇÃO<br>O Cliente está desativado! Contacte o Administrador para reativar a conta!';
                $tipo='alert';
            else:
                if($cliente->logar($email, $senha)):
                    $resultenderecousuario = $endereco->find($_SESSION['endereco_id']);
                    $_SESSION['cep'] = $resultenderecousuario->cep;
                    #$_SESSION['nomeusuario'] = $_POST['login'];
                    #header("location: logaremp.php");
                    header('location: ../index.php');
                else:
                    $msgreturn='Erro<br> Email/Senha incorreto!';
                    $tipo='error';
                endif;
            endif;
        endif;  
    endif;
    
    //configuração para botão deslogar//
    if(isset($_GET['logout'])):
        if($_GET['logout'] == 'ok'):
            if ($_SESSION['logadoadm']):
                funcionario::deslogar();
            else:
                cliente::deslogar();
            endif;
        endif;
    endif;
    
    
    
    if(isset($_POST['logarclienteidentificacao'])):
        
        $email  = filter_input(INPUT_POST, "emaillogin", FILTER_SANITIZE_MAGIC_QUOTES);
        $senha  = filter_input(INPUT_POST, "senhalogin", FILTER_SANITIZE_MAGIC_QUOTES);

        $cliente->setEmail($email);
        $cliente->setSenha($senha);

        if (($_POST['emaillogin'] == '') AND ($_POST['senhalogin'] == '')):
            $msgreturn='Senhor Usuário<br>Por favor, preencha todos os campos obrigatórios no Login!';
            $tipo='alert';
        else:
            if($cliente->selectestado($email) != NULL):
                $msgreturn='ATENÇÃO<br>O Cliente está desativado! Contacte o Administrador para reativar a conta!';
                $tipo='alert';
            else:
                if($cliente->logar($email, $senha)):
                    $resultenderecousuario = $endereco->find($_SESSION['endereco_id']);
                    $_SESSION['cep'] = $resultenderecousuario->cep;
                    #$_SESSION['nomeusuario'] = $_POST['login'];
                    #header("location: logaremp.php");
                    header('location: finaliza-compra.php');
                else:
                    $msgreturn='Erro<br> Email/Senha incorreto!';
                    $tipo='error';
                endif;
            endif;
        endif;  
    endif;