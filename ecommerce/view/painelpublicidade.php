<?php
    $titulopage = 'ADM Ecommerce - Publicidade';
    $nomemenu   = 'admin';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'header/head.php'; ?>
</head><!--/head-->

<?php
    // Controle de Acesso Nível Master
        include '../controller/nivelacesso.control.php';
    
    // Insert
        include '../controller/bannerinsert.control.php';
        
        
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR USUARIO//////////////////////////////////////////////////
    if(isset($_GET['acaoCom']) && $_GET['acaoCom'] == 'deletar'): //Ação de deletar
        $id = $_GET['nome'];
        if (unlink($id)):
            header('location: painelpublicidade.php');
        endif;

    endif;
?>

<body>
    <?php include_once 'header.php'; ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Painel Administrativo</h2>
                        
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="administrativo.php">Início</a></li>
                                <li class="active">Painel Banner</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Banner / Publicidade</h3>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-4">
                                        <div class="login-form"><!--login form-->
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <h2>Adicionar Banner</h2>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <label>Selecione uma Imagem</label>
                                                <input type="file" id="visualimg" class="btn btn-default btn-block" name="arquivo" />
                                                <h2>OU</h2>
                                                <label>Digite o caminho da imagem</label>
                                                <input type="text" name="srcimg" placeholder="Clique na imagem da Galeria (ao lado) e cole aqui (Ctrl + v)" />
                                                <label>Selecione a Posição</label>
                                                <select class="btn btn-default" name="posicao">
                                                    <optgroup label="Localização do Banner">
                                                        <option value="sup">Superior</option>
                                                        <option selected value="esq">Lateral - Esquerda</option>
                                                    </optgroup>
                                                </select>
                                                <input type="submit" name="uploadimagem" class="btn btn-primary btn-block" value="Atualizar Banner" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-left">
                                        <div class="login-form">
                                            <h2>Banner Atual</h2>
                                            <?php 
                                                foreach($bnnpubli->findAll() as $key => $valbnnpubli): 
                                                    if ($valbnnpubli->posicao == 'sup'): 
                                                        echo '<h4>Superior</h4>';
                                                        echo '<img style="width:200px;heigth:50px;" src="../'.$valbnnpubli->caminho_img.'">';
                                                    else: 
                                                        echo '<h4>Esquerdo</h4>';
                                                        echo '<img style="width:100px;heigth:70px;" src="../'.$valbnnpubli->caminho_img.'">';
                                                    endif;
                                                endforeach; 
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-left">
                                        
                                        <div class="login-form">
                                            <h2>Galeria [Diversos]</h2>
                                        </div>
                                        
                                        <?php 
                                            $files = glob("../web/images/uploads/*.*"); 
                                            $cont = 1;
                                            for ($i=0; $i<count($files); $i++) {
                                                $num = $files[$i];
                                                $tam = $files[$i];
                                                $ext = $files[$i];
                                                echo
                                                '
                                                    <button style="width:100px;height:100px;" data-clipboard-text="'.$num.'" class="btncopyimg"><img style="width:80%;" src="'.$num.'"><button>
                                                ';
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
	
    <?php include_once 'footer.php'; ?>


    
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>

    <script src="../web/js/clipboard.js"></script>
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
