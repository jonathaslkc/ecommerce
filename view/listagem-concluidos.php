<?php
    $titulopage = 'ADM Ecommerce - Concluídos';
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
    if(isset($_GET['acaoItemdel']) && $_GET['acaoItemdel'] == 'deletar'): //Ação de deletar
        $id = $_GET['id'];
        if ($itens->delete($id)):
            header('location: listagem-itens.php');
        endif;
    endif;
    
///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR USUARIO//////////////////////////////////////////////////
    if(isset($_GET['actiongallerysl']) && $_GET['actiongallerysl'] == 'del'): //Ação de deletar
        $id = $_GET['nome'];
        if (unlink($id)):
            header('location: painelslider.php');
        endif;
    endif;
    
    ///////////////////////////////////TELA PARA CADASTRAR/EDITAR/EXCLUIR USUARIO//////////////////////////////////////////////////
    if(isset($_GET['acaodesativaitem']) && $_GET['acaodesativaitem'] == 'altera'): //Ação de deletar
        $id = $_GET['id'];
        if ($itens->alteraativod($id)):
            header('location: listagem-itens.php');
        endif;
    endif;
    if(isset($_GET['acaoativaitem']) && $_GET['acaoativaitem'] == 'altera'): //Ação de deletar
        $id = $_GET['id'];
        if ($itens->alteraativoa($id)):
            header('location: listagem-itens.php');
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
                                <li class="active">Concluídos</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h2>Listagem - <b class="text-success">Concluídos</b></h2>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="shopper-info text-left" >
                                            <form method="POST" name="" action="">
                                                <label>Organizar: <a href=''>[Ordem A-Z]</a> - <a href=''>[Ordem Z-A]</a> - <a href=''>[Últimos]</a></label>
                                                <input type="text" placeholder="Pesquisar">
                                            </form>
                                        </div>
                                        <div class="row" style="overflow:auto">
                                            <table class="table">
                                                <th>ID</th>
                                                <th>Cliente</th>
                                                <th>Produto</th>
                                                <th>Endereço</th>
                                                <th>Produto + Frete</th>
                                                <th>Quantidade</th>
                                                <th>Total</th>
                                                <th>Data</th>
                                                <th>Img</th>
                                                <th>Ação</th>
                                                <?php
                                                    foreach($itens->findAll() as $key => $valitens): 
                                                        echo '<tr>';
                                                        if($itens->findAll() == NULL){
                                                            echo 'Nenhum Slider Cadastrado!';
                                                        }else{
                                                            echo '<td>'.$valitens->fkcategoria.'</td>';
                                                            echo '<td>'.$valitens->fksubcategoria.'</td>';
                                                            echo '<td>'.$valitens->codigo.$valitens->id.'</td>';
                                                            echo '<td>'.$valitens->marca.'</td>';
                                                            echo '<td>'.$valitens->valor.'</td>';
                                                            echo '<td>';
                                                                if($valitens->destaque == 's'):
                                                                    echo 'Sim';
                                                                else:
                                                                    echo 'Não';
                                                                endif;
                                                            echo '</td>';
                                                            echo '<td>'.$valitens->datacadastro.'</td>';
                                                            echo '<td><img src="'.$valitens->img.'" style="width:60px;"></td>';
                                                            echo '<td>';
                                                                if($valitens->ativo == '1'):
                                                                    echo "<a href='listagem-itens.php?acaodesativaitem=altera&id=" . $valitens->id . "' title='Desativar?' onclick='return confirm(\"Deseja realmente alterar para Desativado o ítem - " . $valitens->nome . " ?\")'><i class='fa fa-check-square fa-2x text-success'></i></a>";
                                                                else:
                                                                    echo "<a href='listagem-itens.php?acaoativaitem=altera&id=" . $valitens->id . "' title='Ativar?' onclick='return confirm(\"Deseja realmente alterar para Ativo o ítem - " . $valitens->nome . " ?\")'><i class='fa fa-ban fa-2x text-danger'></i></a>";
                                                                endif;
                                                            echo '</td>';
                                                            echo '<td>';
                                                                echo "<a class='btn btn-warning btn-medium btn-block' target='_blank' href='editor-painelitens.php?acao=editar&id=" . $valitens->id . "'>Histórico</a>";
                                                                echo "<a class='btn btn-info btn-medium btn-block' href='listagem-itens.php?acaoItemdel=deletar&id=" . $valitens->id . "' onclick='return confirm(\"Deseja realmente deletar " . $valitens->nome . " ?\")'>Contato</a>";
                                                            echo '</td>';
                                                        }
                                                        echo '</tr>';
                                                    endforeach;
                                                ?>
                                            </table>
                                        </div>
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
