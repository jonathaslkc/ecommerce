<?php
    $titulopage = 'ADM Ecommerce - Fornecedores';
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
    
    // Delete
        include '../controller/fornecedordelete.control.php';
        
    // Update
        include '../controller/fornecedorupdate.control.php';


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
                                <li><a href="painelfornecedor.php">Cadastro de fornecedores</a></li>
                                <li class="active">Listagem de fornecedores</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Listagem de Fornecedores</h3>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-12 text-center">
                                        <div class="shopper-info text-left" >
                                            <form method="POST" name="" action="">
                                                <!-- <label>Organizar por: <a href='' title="Nome">*[A-Z]</a> - <a href='' title="Nome">*[Z-A]</a> - <a href=''>[Ativos]</a> - <a href=''>[Inativos]</a></label> -->
                                                <input type="text" name="buscaNome" placeholder="Pesquisar por nome fantasia" autofocus>
                                            </form>
                                        </div>
                                        <div class="row" style="overflow:auto">
                                            <table class="table">
                                                <th>ID</th>
                                                <th>CNPJ</th>
                                                <th>Insc. Estadual</th>
                                                <th>Insc. Municipal</th>
                                                <th>Razão</th>
                                                <th>Fantasia</th>
                                                <th>Img</th>
                                                <th>Ação</th>
                                                <?php
                                                    if (@$_POST['buscaNome']):
                                                        foreach($fornecedor->findFantasia(@$_POST['buscaNome']) as $key => $resultforn): 
                                                            echo '<tr>';
                                                                echo '<td>'.$resultforn->fornecedor_id.'</td>';
                                                                echo '<td class="text-left">'.$resultforn->cnpj.'</td>';
                                                                echo '<td class="text-left">'.$resultforn->insc_estadual.'</td>';
                                                                echo '<td>'.$resultforn->insc_municipal.'</td>';
                                                                echo '<td>'.$resultforn->razao_social.'</td>';
                                                                echo '<td>'.$resultforn->fantasia.'</td>';
                                                                echo '<td><img src="../'.$resultforn->imagem.'" style="width:60px;"></td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editor-fornecedor.php?acao=editar&id=" . $resultforn->fornecedor_id . "'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-fornecedor.php?acaoForndel=deletar&id=" . $resultforn->fornecedor_id . "' onclick='return confirm(\"Deseja realmente deletar " . $resultforn->fantasia . " ?\")'>Deletar</a>";
                                                                echo '</td>';
                                                            echo '</tr>';
                                                        endforeach;
                                                    else:
                                                        foreach($fornecedor->findAllfantasia() as $key => $resultforn): 
                                                            echo '<tr>';
                                                            if($fornecedor->findAllfantasia() == NULL):
                                                                echo 'Nenhum Funcionário Cadastrado!';
                                                            else:

                                                                echo '<td>'.$resultforn->fornecedor_id.'</td>';
                                                                echo '<td class="text-left">'.$resultforn->cnpj.'</td>';
                                                                echo '<td class="text-left">'.$resultforn->insc_estadual.'</td>';
                                                                echo '<td>'.$resultforn->insc_municipal.'</td>';
                                                                echo '<td>'.$resultforn->razao_social.'</td>';
                                                                echo '<td>'.$resultforn->fantasia.'</td>';
                                                                echo '<td><img src="../'.$resultforn->imagem.'" style="width:60px;"></td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' target='_blank' href='editor-fornecedor.php?acao=editar&id=" . $resultforn->fornecedor_id . "'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-fornecedores.php?acaoForndel=deletar&id=" . $resultforn->fornecedor_id . "' onclick='return confirm(\"Deseja realmente deletar " . $resultforn->fantasia . " ?\")'>Deletar</a>";
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


    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>

    
</body>
</html>
