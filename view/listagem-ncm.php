<?php
    $titulopage = 'ADM Ecommerce - NCM';
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
        include '../controller/ncminsert.control.php';

    // Update
        include '../controller/ncmupdate.control.php';
        
    // Delete
        include '../controller/ncmdelete.control.php';


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
                                <li><a href="painelitens.php">Cadastro de Produtos</a></li>
                                <li class="active">Listagem de NCM</li>
                            </ol>
			</div>
                        
                        <div class="single-blog-post">
                            <div class="row">
                                
                                <div class="col-sm-4">
                                    <div class="single-blog-post">
                                        <h3>Cadastro de NCM</h3><br>
                                        
                                        <?php echo msg($msgreturn, $tipo); ?>
                                        
                                        <?php if (isset($resultadoNCM) && ($resultadoNCM === True)): ?>

                                            <form method="POST" action="" name="">
                                                <div class="contact-form">
                                                    <div class="form-group col-md-6">
                                                        <label>NCM</label>
                                                        <input type="text" placeholder="NCM" name="ncm" readonly value="<?php echo $resultadoNCMValue->ncm_id; ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Nome</label>
                                                        <input type="text" placeholder="Nome" name="nome" required value="<?php echo $resultadoNCMValue->nome; ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>CEST</label>
                                                        <input type="text" placeholder="cest" name="cest" value="<?php echo $resultadoNCMValue->cest; ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>ST</label>
                                                        <input type="text" placeholder="st" name="st" value="<?php echo $resultadoNCMValue->st; ?>">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>ICMS</label>
                                                        <input type="text" placeholder="ICMS"  name="icms" value="<?php echo $resultadoNCMValue->icms; ?>">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>PIS</label>
                                                        <input type="text" placeholder="PIS" name="pis" value="<?php echo $resultadoNCMValue->pis; ?>">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>IPI</label>
                                                        <input type="text" placeholder="IPI" name="ipi" value="<?php echo $resultadoNCMValue->ipi; ?>">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>COFINS</label>
                                                        <input type="text" placeholder="COFINS" name="cofins" value="<?php echo $resultadoNCMValue->cofins; ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>CSOSN</label>
                                                        <input type="text" placeholder="csosn" name="csosn" value="<?php echo $resultadoNCMValue->csosn; ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>ICMS SUBST</label>
                                                        <input type="text" placeholder="icms subst" name="icms_subst" value="<?php echo $resultadoNCMValue->icms_subst; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <a class='btn btn-default btn-block btn-lg' href="listagem-ncm.php">Cancelar</a>
                                                    </div>
                                                    <div class="form-group col-sm-8">
                                                        <button type="submit" name="AlterarNCM" onclick="return confirm('Tem certeza que deseja atualizar este NCM?');" class="btn btn-warning btn-block btn-lg">Atualizar NCM</button>
                                                    </div>
                                                </div>
                                            </form>

                                        <?php else: ?>
                                        
                                            <form method="POST" action="" name="">
                                                <div class="contact-form">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" placeholder="NCM" name="ncm" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="text" placeholder="Nome" name="nome" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="text" placeholder="cest" name="cest">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="text" placeholder="st" name="st">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="number" min="0.01" max="100" step="0.01" placeholder="ICMS"  name="icms">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="number" min="0.01" max="100" step="0.01" placeholder="PIS" name="pis">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="number" min="0.01" max="100" step="0.01" placeholder="IPI" name="ipi">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="number" min="0.01" max="100" step="0.01" placeholder="COFINS" name="cofins">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="text" placeholder="csosn" name="csosn">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="number" min="0.01" max="100" step="0.01" placeholder="icms subst" name="icms_subst">
                                                    </div>

                                                    <input type="submit" name="cadncm" class="btn btn-primary" value="Cadastrar NCM">
                                                </div>
                                            </form>
                                        
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-sm-8">
                                    <h3>Listagem de NCM</h3><br>
                                    <div class="text-center">
                                        <div class="shopper-info text-left" >
                                            <form method="POST" name="" action="">
                                                <input type="text" name="buscaNome" placeholder="Pesquisar por NCM" autofocus>
                                            </form>
                                        </div>
                                        <div style="overflow:auto">
                                            <table class="table">
                                                <th>NCM</th>
                                                <th>Nome</th>
                                                <th>CEST</th>
                                                <th>ST</th>
                                                <th>ICMS</th>
                                                <th>PIS</th>
                                                <th>IPI</th>
                                                <th>COFINS</th>
                                                <th>CSOSN</th>
                                                <th>ICMS SUBST</th>
                                                <th>AÇÃO</th>
                                                <?php
                                                    if (@$_POST['buscaNome']):
                                                        foreach($ncm->findNcm(@$_POST['buscaNome']) as $key => $resultNcm): 
                                                            echo '<tr>';
                                                                echo '<td>'.$resultNcm->ncm_id.'</td>';
                                                                echo '<td class="text-left">'.$resultNcm->nome.'</td>';
                                                                echo '<td>'.$resultNcm->cest.'</td>';
                                                                echo '<td>'.$resultNcm->st.'</td>';
                                                                echo '<td>'.$resultNcm->icms.'</td>';
                                                                echo '<td>'.$resultNcm->pis.'</td>';
                                                                echo '<td>'.$resultNcm->ipi.'</td>';
                                                                echo '<td>'.$resultNcm->cofins.'</td>';
                                                                echo '<td>'.$resultNcm->csosn.'</td>';
                                                                echo '<td>'.$resultNcm->icms_subst.'</td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' href='listagem-ncm.php?ActionEditPanel=yes&ident=" .md5($resultNcm->ncm_id). "'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-ncm.php?acaoNcm=deletar&id=" . $resultNcm->ncm_id . "' onclick='return confirm(\"Deseja realmente deletar o NCM " . $resultNcm->ncm_id . " ?\")'>Deletar</a>";
                                                                echo '</td>';
                                                            echo '</tr>';
                                                        endforeach;
                                                    else:
                                                        foreach($ncm->findAllId() as $key => $resultNcm): 
                                                            echo '<tr>';
                                                            if($ncm->findAllId() == NULL):
                                                                echo 'Nenhum NCM Cadastrado!';
                                                            else:
                                                                echo '<td>'.$resultNcm->ncm_id.'</td>';
                                                                echo '<td class="text-left">'.$resultNcm->nome.'</td>';
                                                                echo '<td>'.$resultNcm->cest.'</td>';
                                                                echo '<td>'.$resultNcm->st.'</td>';
                                                                echo '<td>'.$resultNcm->icms.'</td>';
                                                                echo '<td>'.$resultNcm->pis.'</td>';
                                                                echo '<td>'.$resultNcm->ipi.'</td>';
                                                                echo '<td>'.$resultNcm->cofins.'</td>';
                                                                echo '<td>'.$resultNcm->csosn.'</td>';
                                                                echo '<td>'.$resultNcm->icms_subst.'</td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' href='listagem-ncm.php?ActionEditPanel=yes&ident=" .md5($resultNcm->ncm_id)."'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='listagem-ncm.php?acaoNcm=deletar&id=" . $resultNcm->ncm_id . "' onclick='return confirm(\"Deseja realmente deletar o NCM " . $resultNcm->ncm_id . " ?\")'>Deletar</a>";
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
