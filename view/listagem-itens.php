<?php
    $titulopage = 'ADM Ecommerce - Ítens';
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
        #include '../controller/ncminsert.control.php';

    // Update
        include '../controller/produtoupdate.control.php';
        
    // Delete
        include '../controller/produtodelete.control.php';
    
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
                                <li><a href="painelitens.php">Cadastro de Ítens</a></li>
                                <li class="active">Listagem de ítens</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Listagem de ítens</h3>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="shopper-info text-left" >
                                            <form method="POST" name="" action="">
                                                <!-- <label>Organizar por: <a href='' title="Nome">*[A-Z]</a> - <a href='' title="Nome">*[Z-A]</a> - <a href=''>[Ativos]</a> - <a href=''>[Inativos]</a></label> -->
                                                <input type="text" name="buscaNome" placeholder="Pesquisar por Nome" autofocus>
                                            </form>
                                        </div>
                                        <div class="row" style="overflow:auto">
                                            <table class="table">
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Marca</th>
                                                <th>Tamanho</th>
                                                <th>Modelo</th>
                                                <th>Preço</th>
                                                <th>NCM</th>
                                                <th>Img</th>
                                                <th>Ativo</th>
                                                <th>Ação</th>
                                                <?php
                                                    if (@$_POST['buscaNome']):
                                                        foreach($itens->findNome(@$_POST['buscaNome']) as $key => $valitens): 
                                                            echo '<tr>';
                                                    
                                                                $resultadopreco         = $preco->find2($valitens->produto_id);
                                                                $resultadocodbarra      = $barra->find2($valitens->produto_id);

                                                                echo '<td>'.$valitens->produto_id.'</td>';
                                                                echo '<td>'.$valitens->nome.'</td>';
                                                                echo '<td>'.$resultadocodbarra->marca.'</td>';
                                                                echo '<td>'.$resultadocodbarra->tamanho.'</td>';
                                                                echo '<td class="text-left">'.$resultadocodbarra->modelo.'</td>';
                                                                echo '<td>R$ '.number_format ($resultadopreco->preco_venda,2).'</td>';
                                                                echo '<td class="text-left">'.$valitens->ncm_id.'</td>';
    //                                                            echo '<td class="text-left">'.$valitens->promocao.'</td>';
    //                                                            echo '<td><img src="'.$valitens->parcelas.'" style="width:60px;"></td>';
    //                                                            echo '<td>'.$valitens->quantidade.'</td>';
                                                                echo '<td><img src="../'.$valitens->caminho_img_frente.'" style="width:60px;"></td>';
                                                                echo '<td>';
                                                                    if($valitens->ativo == '1'):
                                                                        echo "<a href='listagem-itens.php?acaodesativaprod=altera&id=" . $valitens->produto_id . "' title='Desativar?' onclick='return confirm(\"Deseja realmente alterar para Desativado o produto - " . $valitens->nome . " ?\")'><i class='fa fa-check-square fa-2x text-success'></i></a>";
                                                                    else:
                                                                        echo "<a href='listagem-itens.php?acaoativaprod=altera&id=" . $valitens->produto_id . "' title='Ativar?' onclick='return confirm(\"Deseja realmente alterar para Ativo o produto - " . $valitens->nome . " ?\")'><i class='fa fa-ban fa-2x text-danger'></i></a>";
                                                                    endif;
                                                                echo '</td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editor-itens.php?acao=editar&id=" . $valitens->produto_id . "'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-itens.php?acaoproddel=deletar&id=" . $valitens->produto_id . "' onclick='return confirm(\"Deseja realmente deletar " . $valitens->nome . "? A ação realizará: 1- Exclusão do Produto; 2- Exclusão do(s) Códigos de Barras Cadastrados.\")'>Deletar</a>";
                                                                echo '</td>';
                                                            
                                                            echo '</tr>';
                                                        endforeach;
                                                    else:
                                                        foreach($itens->findAllnome() as $key => $valitens): 
                                                            echo '<tr>';
                                                            if($itens->findAllnome() == NULL):
                                                                echo 'Nenhum Funcionário Cadastrado!';
                                                            else:
                                                                
                                                                $resultadopreco         = $preco->find2($valitens->produto_id);
                                                                $resultadocodbarra      = $barra->find2($valitens->produto_id);

                                                                echo '<td>'.$valitens->produto_id.'</td>';
                                                                echo '<td class="text-left">'.$valitens->nome.'</td>';
                                                                echo '<td>'.$resultadocodbarra->marca.'</td>';
                                                                echo '<td>'.$resultadocodbarra->tamanho.'</td>';
                                                                echo '<td>'.$resultadocodbarra->modelo.'</td>';
                                                                echo '<td>R$ '.number_format ($resultadopreco->preco_venda,2).'</td>';
                                                                echo '<td class="text-left">'.$valitens->ncm_id.'</td>';
    //                                                            echo '<td class="text-left">'.$valitens->promocao.'</td>';
    //                                                            echo '<td><img src="'.$valitens->parcelas.'" style="width:60px;"></td>';
    //                                                            echo '<td>'.$valitens->quantidade.'</td>';
                                                                echo '<td><img src="../'.$valitens->caminho_img_frente.'" style="width:60px;"></td>';
                                                                echo '<td>';
                                                                    if($valitens->ativo == '1'):
                                                                        echo "<a href='listagem-itens.php?acaodesativaprod=altera&id=" . $valitens->produto_id . "' title='Desativar?' onclick='return confirm(\"Deseja realmente alterar para Desativado o produto - " . $valitens->nome . " ?\")'><i class='fa fa-check-square fa-2x text-success'></i></a>";
                                                                    else:
                                                                        echo "<a href='listagem-itens.php?acaoativaprod=altera&id=" . $valitens->produto_id . "' title='Ativar?' onclick='return confirm(\"Deseja realmente alterar para Ativo o produto - " . $valitens->nome . " ?\")'><i class='fa fa-ban fa-2x text-danger'></i></a>";
                                                                    endif;
                                                                echo '</td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editor-itens.php?acao=editar&id=" . $valitens->produto_id . "'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-itens.php?acaoproddel=deletar&id=" . $valitens->produto_id . "' onclick='return confirm(\"Deseja realmente deletar " . $valitens->nome . "? A ação realizará: 1- Exclusão do Produto; 2- Exclusão do(s) Código(s) de Barra Cadastrado(s).\")'>Deletar</a>";
                                                                echo '</td>';
                                                            endif;
                                                            echo '</tr>';
                                                        endforeach;
                                                    endif;
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
