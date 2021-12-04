<?php
    $titulopage = 'ADM Ecommerce - Códigos de Barras';
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
        include '../controller/codbarrasinsert.control.php';

    // Update
        include '../controller/codbarrasupdate.control.php';
        
    // Delete
        include '../controller/codbarrasdelete.control.php';


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
                                <li><a href="painelitens.php">Produtos</a></li>
                                <li class="active">Listagem de Códigos de Barras</li>
                            </ol>
			</div>
                        
                        <div class="single-blog-post">
                            <div class="row">
                                
                                <div class="col-sm-4">
                                    <div class="single-blog-post">
                                        <h3>Cadastro de Código de Barras</h3><br>
                                        
                                        <?php echo msg($msgreturn, $tipo); ?>
                                        
                                        <?php if (isset($resultadoCodBarr) && ($resultadoCodBarr === True)): ?>

                                            <form method="POST" action="" name="">
                                                <div class="contact-form">
                                                    <div class="form-group col-sm-12">
                                                        <label>Código de  Barras</label>
                                                        <input type="text" name="codbarra_id" value="<?php echo $resultadoCodBarrasValue->codbarra_id; ?>" readonly />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Fornecedor</label>
                                                        <input type="text" name="fornecedor_id" value="<?php echo $resultadoCodBarrasValue->fornecedor_id; ?>" readonly />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Produto</label>
                                                        <input type="text" name="produto_id" value="<?php echo $resultadoCodBarrasValue->produto_id; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label>Marca</label>
                                                    <input type="text" name="marca" value="<?php echo $resultadoCodBarrasValue->marca; ?>" placeholder="Digite aqui a marca..." />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Tamanho</label>
                                                    <input type="text" name="tamanho" value="<?php echo $resultadoCodBarrasValue->tamanho; ?>" placeholder="Ex.: P, M, G... 36, 38, 40..." />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Modelo</label>
                                                    <input type="text" name="modelo" value="<?php echo $resultadoCodBarrasValue->modelo; ?>" placeholder="Digite aqui o modelo..." />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Cor</label>
                                                    <input type="color" value="<?php echo $resultadoCodBarrasValue->cor; ?>" name="cor" />
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <a class='btn btn-default btn-block btn-lg' href="listagem-codbarras.php">Cancelar</a>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <button type="submit" name="AlterarCodBarras" onclick="return confirm('Tem certeza que deseja atualizar este Código de Barras?');" class="btn btn-warning btn-block btn-lg">Atualizar Código de Barras</button>
                                                </div>
                                                
                                            </form>

                                        <?php else: ?>
                                        
                                            <form method="POST" action="" name="">
                                                <div class="contact-form">
                                                    <div class="row text-center">
                                                        <div class="form-group col-sm-12">
                                                            <label>Código de  Barras</label>
                                                            <input type="text" name="codbarra_id" required placeholder="Digite aqui" />
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Fornecedor</label>
                                                            <select name="fornecedor_id" required class="input-block-level" size="3">
                                                                <?php
                                                                    if (empty($fornecedor->findAllfantasia())):
                                                                        echo "<optgroup label='Nenhum Fornecedor cadastrado!'></optgroup>";
                                                                    else:
                                                                        foreach($fornecedor->findAllfantasia() as $key => $valForn):
                                                                            echo "<option value='".$valForn->fornecedor_id."'>".$valForn->cnpj." - ".$valForn->fantasia."</option>";
                                                                        endforeach;
                                                                    endif;
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label>Produto</label>
                                                            <select name="produto_id" required class="input-block-level" size="5">
                                                                <?php
                                                                    if (empty($itens->findAllnome())):
                                                                        echo "<optgroup label='Nenhum Fornecedor cadastrado!'></optgroup>";
                                                                    else:
                                                                        foreach($itens->findAllnome() as $key => $valProd):
                                                                            echo "<option value='".$valProd->produto_id."'>".$valProd->produto_id." - ".$valProd->nome."</option>";
                                                                        endforeach;
                                                                    endif;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group col-md-8">
                                                        <label>Marca</label>
                                                        <input type="text" name="marca" placeholder="Digite aqui a marca..." />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Tamanho</label>
                                                        <input type="text" name="tamanho" placeholder="Ex.: P, M, G... 36, 38, 40..." />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Modelo</label>
                                                        <input type="text" name="modelo" placeholder="Digite aqui o modelo..." />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Cor</label>
                                                        <input type="color" name="cor" />
                                                    </div>

                                                    <input type="submit" name="cadCodBarras" class="btn btn-primary" value="Cadastrar Código de Barras">
                                                </div>
                                            </form>
                                        
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-sm-8">
                                    <h3>Listagem de Códigos de Barras</h3><br>
                                    <div class="text-center">
                                        <div class="shopper-info text-left" >
                                            <form method="POST" name="" action="">
                                                <input type="text" name="buscaNome" placeholder="Pesquisar por Código de Barras" autofocus>
                                            </form>
                                        </div>
                                        <div style="overflow:auto">
                                            <table class="table">
                                                <th>Ord.</th>
                                                <th>Código de Barras</th>
                                                <th>Produto</th>
                                                <th>Fornecedor</th>
                                                <th>Marca</th>
                                                <th>Tamanho</th>
                                                <th>Modelo</th>
                                                <th>Cor</th>
                                                <th>AÇÃO</th>
                                                <?php
                                                    if (@$_POST['buscaNome']):
                                                        foreach($barra->findCodBarras(@$_POST['buscaNome']) as $key => $resultCodBarras): 
                                                            
                                                            $resultProd = $itens->find($resultCodBarras->produto_id);
                                                            $resultForn = $fornecedor->find($resultCodBarras->fornecedor_id);
                                                    
                                                            echo '<tr>';
                                                                echo '<td>'.($key+1).'</td>';
                                                                echo '<td class="text-left">'.$resultCodBarras->codbarra_id.'</td>';
                                                                echo '<td>'.$resultProd->nome.'</td>';
                                                                echo '<td>'.$resultForn->cnpj.'<br>'.$resultForn->fantasia.'</td>';
                                                                echo '<td>'.$resultCodBarras->marca.'</td>';
                                                                echo '<td>'.$resultCodBarras->tamanho.'</td>';
                                                                echo '<td>'.$resultCodBarras->modelo.'</td>';
                                                                echo '<td><div style="border-radius:50%; -moz-border-radius:50%; -webkit-border-radius:50%; background:'.$resultCodBarras->cor.'">Cor</div></td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' href='listagem-codbarras.php?ActionEditPanel=yes&ident=" .md5($resultCodBarras->codbarra_id). "'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-codbarras.php?acaoCodBarras=deletar&id=" . $resultCodBarras->codbarra_id . "' onclick='return confirm(\"Deseja realmente deletar o Código de Barras " . $resultCodBarras->codbarra_id . " ?\")'>Deletar</a>";
                                                                echo '</td>';
                                                            echo '</tr>';
                                                        endforeach;
                                                    else:
                                                        foreach($barra->findAllForn() as $key => $resultCodBarras): 
                                                            echo '<tr>';
                                                            if($barra->findAllForn() == NULL):
                                                                echo 'Nenhum NCM Cadastrado!';
                                                            else:
                                                                
                                                                $resultProd = $itens->find($resultCodBarras->produto_id);
                                                                $resultForn = $fornecedor->find($resultCodBarras->fornecedor_id);
                                                                
                                                                echo '<td>'.($key+1).'</td>';
                                                                echo '<td class="text-left">'.$resultCodBarras->codbarra_id.'</td>';
                                                                echo '<td>'.$resultProd->produto_id.'<br>'.$resultProd->nome.'</td>';
                                                                echo '<td>'.$resultForn->cnpj.'<br>'.$resultForn->fantasia.'</td>';
                                                                echo '<td>'.$resultCodBarras->marca.'</td>';
                                                                echo '<td>'.$resultCodBarras->tamanho.'</td>';
                                                                echo '<td>'.$resultCodBarras->modelo.'</td>';
                                                                echo '<td><div style="border-radius:50%; -moz-border-radius:50%; -webkit-border-radius:50%; background:'.$resultCodBarras->cor.'">Cor</div></td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' href='listagem-codbarras.php?ActionEditPanel=yes&ident=" .md5($resultCodBarras->codbarra_id)."'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-codbarras.php?acaoCodBarras=deletar&id=" . $resultCodBarras->codbarra_id . "' onclick='return confirm(\"Deseja realmente deletar o Código de Barras " . $resultCodBarras->codbarra_id . " ?\")'>Deletar</a>";
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
                                
                            </div>
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
