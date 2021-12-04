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
    
    if(isset($_POST['InserirSlider'])):
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

                ##BannerPublicidade
                $img        = $_UP['pasta'].$nome_final;
                $titulo     = $_POST['titulo'];
                $descricao  = $_POST['descricao'];
                $valorpubli = $_POST['vl'];
                $ordenacao  = $_POST['ordenacao'];
                $ativo      = '1';

                $slider->setImg($img);
                $slider->setTitulo($titulo);
                $slider->setDescricao($descricao);
                $slider->setValorpubli($valorpubli);
                $slider->setOrdenacao($ordenacao);
                $slider->setAtivo($ativo);

                if ($slider->selectexisteregistro($ordenacao) == NULL):
#                    echo "<script>alert('Pode Gravar!')</script>";
                    $slider->insert();
                    header('location: painelslider.php');
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
            $img        = $_POST['srcimg'];
            $titulo     = $_POST['titulo'];
            $descricao  = $_POST['descricao'];
            $valorpubli = $_POST['vl'];
            $ordenacao  = $_POST['ordenacao'];
            $ativo      = '1';

            $slider->setImg($img);
            $slider->setTitulo($titulo);
            $slider->setDescricao($descricao);
            $slider->setValorpubli($valorpubli);
            $slider->setOrdenacao($ordenacao);
            $slider->setAtivo($ativo);

            if ($slider->selectexisteregistro($ordenacao) == NULL):
                
                echo "<script>alert('Pode Gravar')</script>";
                $slider->insert();
                #echo "<script>windows.location('localhost/ecommerce/painelslider.php')</script>";
                header('location: painelslider.php');
            else:
//                if ($bnnpubli->insert()):
                    echo "<script>alert('Não pode gravar')</script>";
                    echo "<script>windows.location('localhost/ecommerce/painelslider.php')</script>";   
//                endif;
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
    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR USUARIO//////////////////////////////////////////////////
    if(isset($_GET['actiongallerysl']) && $_GET['actiongallerysl'] == 'del'): //Ação de deletar
        $id = $_GET['nome'];
        if (unlink($id)):
            header('location: painelslider.php');
        endif;
    endif;
    
    if(isset($_POST['AlterarOrd'])):
        
        $id1        = $_POST['id1'];
        $id2        = $_POST['id2'];

        #if ($slider->selectexisteregistro($ordenacao) == NULL):
        
        if ($slider->selectexisteid($id1,$id2)):
            
        endif;
            #header('location: painelslider.php');
        #else:
        #    echo "<script>alert('Não pode gravar')</script>";
        #    echo "<script>windows.location('localhost/ecommerce/painelslider.php')</script>";
        #endif;

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
                                <li class="active">Painel Slider</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Slider</h3>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-5">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Adicionar Banners (Slider)</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <label>Selecione uma Imagem do Computador</label>
                                                <input type="file" id="visualimg" class="btn btn-default btn-block" name="arquivo" />
                                                <h2>OU</h2>
                                                <label>Digite o Caminho da Imagem</label>
                                                <input type="text" name="srcimg" placeholder="Copie da galeria e cole aqui (Ctrl + v)" />
                                                <label class="text-danger">*Selecione um imagem do computador ou ~cole [Ctrl + V] um endereço de imagem*<br>*Caso os dois estejam preenchidos, será priorizado o campo do endereço*</label>
                                                <hr>
                                                <label>Título</label>
                                                <input type="text" name="titulo" placeholder="Título" />
                                                <label>Descrição</label>
                                                <textarea name="descricao" placeholder="Digite aqui uma Descrição (Máx. 255 Caractéres)" maxlength="255"></textarea>
                                                <hr>
                                                <label>Sequência do Slider</label><br>
                                                <div>
                                                    <label>Slider de número - </label>
                                                    <?php
                                                        #for($i = 1; $i <= 5; $i++):
                                                            (int)$cont = 0;
                                                            foreach($slider->findAll() as $key => $valbnslider): 
                                                                $cont = $cont + 1;
                                                            endforeach;
                                                            if($cont >= 5):
                                                                echo '<label class="text-danger">Número de Slider cadastrados excedidos! <br> Edite um já cadastrado ou exclua-o.</label>';
                                                            else:
                                                                for($i = 1; $i <= 5; $i++):
                                                                    echo ' *'.$i.' <label class=""><input ';
                                                                        foreach($slider->findAll() as $key => $valbnslider): 
                                                                            echo 'value="'.$i.'"';
                                                                            if ($valbnslider->ordem_do_slide == $i){
                                                                                echo ' disabled ';
                                                                            }
                                                                        endforeach;
                                                                    echo ' type="radio" name="ordenacao"> </label>';
                                                                endfor;
                                                            endif;
                                                        #endfor;
                                                    ?>
                                                </div>
                                                <hr>

                                                <input type="submit" name="InserirSlider" class="btn btn-primary" value="Cadastrar Slider" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 text-center">
                                        <a href="#" onclick="window.open('slider-page.php', 'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"><i class="btn btn-lg fa fa-eye fa-5x"></i>Visualizar Slider Completo</a>
                                        <a href="#" data-toggle="modal" data-target="#modalImgSlide"><i class="btn btn-lg fa fa-5x fa-picture-o"></i> Visualizar Galeria</a>
                                        <div class="row" style="overflow:auto">
                                            <table class="table">
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descrição</th>
                                                <th>Imagem</th>
                                                <th>Ordenação</th>
                                                <th>Ação</th>
                                                <?php
                                                    foreach($slider->selectAll() as $key => $valbnslider): 
                                                        echo '<tr>';
                                                        if($slider->selectAll() == NULL){
                                                            echo 'Nenhum Slider Cadastrado!';
                                                        }else{
                                                            echo '<td>'.$valbnslider->slider_id.'</td>';
                                                            echo '<td class="text-left">'.$valbnslider->titulo.'</td>';
                                                            echo '<td class="text-left">'.$valbnslider->descricao.'</td>';
                                                            echo '<td><img src="../'.$valbnslider->caminho_img.'" style="width:60px;"></td>';
                                                            echo '<td><h4>'.$valbnslider->ordem_do_slide.'</h4></td>';
                                                            echo '<td>';
                                                                echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editor-painelslider.php?acao=editar&id=" . $valbnslider->slider_id . "'>Editar</a>";
                                                                echo "<a class='btn btn-danger btn-medium btn-block' href='painelslider.php?acaoSlidel=deletar&nome=" . $valbnslider->slider_id . "' onclick='return confirm(\"Deseja realmente deletar " . $valbnslider->titulo . " ?\")'>Deletar</a>";
                                                            echo '</td>';
                                                        }
                                                        echo '</tr>';
                                                    endforeach;
                                                ?>
                                            </table>
                                        </div>
                                        <div>
                                            <hr>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="">
                                                <label>Alterar Ordem: </label>
                                                <input type="text" name="id1" class="input-sm" placeholder="De ID..." />
                                                <input type="text" name="id2" class="input-sm" placeholder="Para ID..." />
                                                <input type="submit" name="AlterarOrd" class="btn btn-info" value="Alterar" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    </div><!--/blog-post-area-->
                </div>	
            </div>
        </div>

        <div class="modal fade" id="modalImgSlide" tabindex="-1" role="dialog" aria-labelledby="modalImgSlide" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Galeria de Imagens</h4>
                    </div>
                    <div class="modal-body">
                        <?php           
                            $files = glob("images/uploads/slider/*.*"); 
                            for ($i=0; $i<count($files); $i++){ 
                                $num = $files[$i]; 
                                echo '<button style="width:100px;" class="btn btn-default">
                                         <img src="'.$num.'" style="width:80px" alt="random image">
                                             <br>
                                             <a class="text-danger" href="painelslider.php?actiongallerysl=del&nome='.$num.'" onclick="return confirm(\"Deseja realmente deletar?\")"><i class="fa fa-times fa-2x"></i></a>
                                             <a class="text-info" href="'.$num.'" target="_blank"><i class="fa fa-eye fa-2x"></i></a>
                                             <a class="btncopyimg text-warning" data-clipboard-text="'.$num.'"><i class="fa fa-copy fa-2x"></i></a>
                                      </button>&nbsp;&nbsp'; 
                            }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Fechar</button>
                        <!--<button type="button" class="btn btn-default btn-lg">Continuar</button>-->
                    </div>
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
