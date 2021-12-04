<?php
    $titulopage = 'ADM Ecommerce - Slider';
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
    
    if(isset($_POST['AlterarSlider'])):
        if(empty($_POST['srcimg']) && (empty($_FILES['arquivo']['name']))):
            
            $id         = $_GET['id'];
            $img        = $_POST['linkimg'];
            $titulo     = $_POST['titulo'];
            $descricao  = $_POST['descricao'];
            $valorpubli = $_POST['vl'];

            $slider->setImg($img);
            $slider->setTitulo($titulo);
            $slider->setDescricao($descricao);
            $slider->setValorpubli($valorpubli);

            if ($slider->update($id)):
                echo "<script>alert('Pode Gravar')</script>";
                #echo "<script>windows.location('localhost/ecommerce/painelslider.php')</script>";
                #header('location: painelslider.php');
            else:
//                if ($bnnpubli->insert()):
                    echo "<script>alert('Não pode gravar')</script>";
                    echo "<script>windows.location('localhost/ecommerce/painelslider.php')</script>";   
//                endif;
            endif;
            
        else:
            if(empty($_POST['srcimg'])):
            
                // Pasta onde o arquivo vai ser salvo
                $_UP['pasta'] = 'images/uploads/slider/';
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

                    $id         = $_GET['id'];
                    $img        = $_UP['pasta'].$nome_final;
                    $titulo     = $_POST['titulo'];
                    $descricao  = $_POST['descricao'];
                    $valorpubli = $_POST['vl'];

                    $slider->setImg($img);
                    $slider->setTitulo($titulo);
                    $slider->setDescricao($descricao);
                    $slider->setValorpubli($valorpubli);

                    if ($slider->update($id)):
                        echo "<script>alert('Pode Gravar!')</script>";
                        #header('location: painelslider.php');
     #                   echo "<script>windows.location('localhost/ecommerce/painelslider.php')</script>";
                    else:
    //                    if ($bnnpubli->insert()):
                            echo "<script>alert('Não pode gravar')</script>";
                            echo "<script>windows.location('localhost/ecommerce/painelslider.php')</script>";
    //                    endif;
                    endif;

                else:
                    // Não foi possível fazer o upload, provavelmente a pasta está incorreta
                    echo "<script>alert('Não foi possível enviar o arquivo, tente novamente')</script>";
                endif;            

            else:





                ##BannerPublicidade
                $id         = $_GET['id'];
                $img        = $_POST['srcimg'];
                $titulo     = $_POST['titulo'];
                $descricao  = $_POST['descricao'];
                $valorpubli = $_POST['vl'];

                $slider->setImg($img);
                $slider->setTitulo($titulo);
                $slider->setDescricao($descricao);
                $slider->setValorpubli($valorpubli);

                if ($slider->update($id)):

                    echo "<script>alert('Pode Gravar')</script>";
                    #echo "<script>windows.location('localhost/ecommerce/painelslider.php')</script>";
                    #header('location: painelslider.php');
                else:
    //                if ($bnnpubli->insert()):
                        echo "<script>alert('Não pode gravar')</script>";
                        echo "<script>windows.location('localhost/ecommerce/painelslider.php')</script>";   
    //                endif;
                endif;

            endif;
        endif;

    endif;
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR USUARIO//////////////////////////////////////////////////
    if(isset($_GET['acaoSlidel']) && $_GET['acaoSlidel'] == 'deletar'): //Ação de deletar
        $id = $_GET['nome'];
        if ($slider->delete($id)):
            header('location: painelslider.php');
        endif;
    endif;
?>

<body>
    <?php include_once 'header.php'; ?>

    <?php if(isset($_GET['acao']) && $_GET['acao'] == 'editar'):
        $id = (int)$_GET['id'];
        $resultado = $slider->find($id);
    endif;?>
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Painel Administrativo</h2>
                        <div class="single-blog-post">
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-6">
                                        <h3>Editor</h3>
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Editar Banner (Slider)</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                    </div>
                                                    <div class="col-sm-4 text-center">
                                                        <div class="form-control text-center" style="width: 150px; height: 150px">
                                                            <img src='<?php echo $resultado->img; ?>' style="width:100%;">
                                                        </div>
                                                        <input type="text" name="linkimg" class="form-control" style="width: 150px;" readonly value="<?php echo $resultado->img; ?>">
                                                    </div>
                                                    <div class="col-sm-4">
                                                    </div>
                                                </div>
                                                <hr>
                                                <label>Selecione uma outra Imagem do seu Computador</label>
                                                <input type="file" id="visualimg" class="btn btn-default btn-block" name="arquivo" />
                                                <h2>OU</h2>
                                                <input type="text" name="srcimg" value="" placeholder="Copie da galeria e cole aqui (Ctrl + v)" />
                                                <input type="text" name="titulo" value="<?php echo $resultado->titulo; ?>" placeholder="Título" />
                                                <input type="text" name="vl" value="<?php echo $resultado->valorpubli; ?>" placeholder="Valor para Inserir no Banner" />
                                                <textarea name="descricao" placeholder="Digite aqui uma Descrição (Máx. 255 Caractéres)" maxlength="255"><?php echo $resultado->descricao; ?></textarea><br>
                                                <div><br>
                                                    <label>Slider de número</label>
                                                    <h3><?php echo $resultado->ordenacao; ?></h3>
                                                </div>
                                                <input type="submit" name="AlterarSlider" class="btn btn-primary btn-block" value="Alterar Slider" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    </div><!--/blog-post-area-->
                </div>	
            </div>
        </div>
    </section>
	
    <?php include_once 'footer.php'; ?>

    
<script type="text/javascript">
   function getValor(valor){
    $("#recebeValor").html("<option value='0'>Carregando...</option>");
        setTimeout(function(){
            $("#recebeValor").load("class/ajaxValor.php",{id:valor})
        }, 500);
};
</script>


    
    <script src="js/jquery.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    
    <script src="js/clipboard.js"></script>
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
