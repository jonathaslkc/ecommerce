<?php
    $titulopage = 'ADM Ecommerce - Galeria';
    $nomemenu   = 'admin';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'header/head.php'; ?>
</head><!--/head-->

<?php
    if(isset($_SESSION['logado'])  && ($_SESSION['tipousuario'] == '1')):  //TESTAR SE ESTÁ LOGADO
        
        else:
            header('location: acessonegado.php');
    endif;
    
    if(isset($_POST['uploadimagem'])):
        // Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = 'images/uploads/itens/';
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
            
            $nome_final = md5(time()).'.jpg';
        endif;

        // Depois verifica se é possível mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)):
            // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
            #echo "<script>alert('Imagem inserida com sucesso!')</script>";
            header('location: gallery-page.php');
            #  echo '<a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
        else:
            // Não foi possível fazer o upload, provavelmente a pasta está incorreta
            echo "<script>alert('Não foi possível enviar o arquivo, tente novamente')</script>";
        endif;
    endif;
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR USUARIO//////////////////////////////////////////////////
    if(isset($_GET['actiongallery']) && $_GET['actiongallery'] == 'del'): //Ação de deletar
        $id = $_GET['nome'];
        if (unlink($id)):
            header('location: galeria.php?gallery='.$_SESSION['enderecoLINKgallery']);
        endif;
    endif;
    
    if(isset($_GET['gallery'])):
        if ($_GET['gallery'] == 'slider'): //Ação de deletar
            $_SESSION['enderecoIMGgallery'] = 'images/uploads/slider/';
            $_SESSION['enderecoLINKgallery'] = 'slider';
        else:
            if($_GET['gallery'] == 'itens'):
                $_SESSION['enderecoIMGgallery'] = 'images/uploads/itens/';
                $_SESSION['enderecoLINKgallery'] = 'itens';
            else:
                if($_GET['gallery'] == 'publicidade'): //Ação de deletar
                    $_SESSION['enderecoIMGgallery'] = 'images/uploads/';
                    $_SESSION['enderecoLINKgallery'] = 'publicidade';
                endif;
            endif;
        endif;
        
        
    endif;
?>

<body>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Painel Administrativo</h2>
                        
                        <div class="breadcrumbs text-right">
                            <ol class="breadcrumb">
                                <li><button class="btn btn-primary" id="btnclose">Fechar Pop-up</button></li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Galeria</h3><label>Caminho: <?php echo $_SESSION['enderecoIMGgallery']; ?></label>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-4">
                                        <div class="login-form"><!--login form-->
                                            <h2>Adicionar Imagem</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <input type="file" id="visualimg" class="btn btn-default btn-block" name="arquivo" />
                                                <input type="submit" name="uploadimagem" class="btn btn-primary btn-block" value="Inserir Imagem" />
                                            </form><br>
                                            <div class="text-left">
                                                <h4 class="text-danger"><i class="fa fa-times"></i> Apagar Imagem</h4>
                                                <h4 class="text-info"><i class="fa fa-eye"></i> Visualizar Imagem</h4>
                                                <h4 class="text-warning"><i class="fa fa-copy"></i> Copiar Endereço</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 text-left">
                                        <?php 
                                            $files = glob('../web/'.$_SESSION['enderecoIMGgallery']."*.*"); 
                                            for ($i=0; $i<count($files); $i++){ 
                                                $num = $files[$i]; 
                                                echo '<button style="width:150px;height:150px;margin:20px 0px 0px 0px" class="btn btn-default">
                                                         <img src="'.$num.'" style="width:80%;height:70%;" alt="random image">
                                                             <br>
                                                             <a class="text-danger" href="galeria.php?actiongallery=del&nome='.$num.'" onclick="return confirm(\"Deseja realmente deletar?\")"><i class="fa fa-times fa-2x"></i></a>
                                                             <a class="text-info" href="'.$num.'" target="_blank"><i class="fa fa-eye fa-2x"></i></a>
                                                             <a class="btncopyimg text-warning" data-clipboard-text="'.$num.'"><i class="fa fa-copy fa-2x"></i></a>
                                                      </button>&nbsp &nbsp &nbsp &nbsp'; 
                                            } 
                                        ?>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    </div><!--/blog-post-area-->
                </div>	
            </div>
        </div>
    </section>

    
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script src="../web/js/clipboard.js"></script>
    <script>
        document.getElementById('btnclose').addEventListener('click', function(){
            window.close();
        }, false);
    </script>
    <script>
        var clipboard = new Clipboard('.btncopyimg');

        // Retorna um alert se copiar com sucesso.
        clipboard.on('success', function(e) {
           alert('Caminho da imagem com sucesso!');
        });
        // Retorna um alert se copiar com erro.
        clipboard.on('error', function(e) {
           alert('Houve um erro ou navegador não suportado');
        });
    </script>
    
</body>
</html>