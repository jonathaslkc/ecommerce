<?php
    $titulopage = 'ADM Ecommerce - Categoria';
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
        include '../controller/categoriainsert.control.php';
        
    // Update
        include '../controller/categoriaupdate.control.php';
        
    // Delete
        include '../controller/categoriadelete.control.php';

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
                                <li class="active">Painel Categoria & Sub Categoria</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Categorias</h3>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-5">
                                        <div class="shopper-info">
                                            <h2>Cadastrar Categoria</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="">
                                                <input type="text" name="categoria" placeholder="Categoria" />
                                                <input type="submit" name="InserirCat" class="btn btn-primary btn-block" value="Cadastrar Categoria" />
                                            </form>
                                            <form method="post" action="">
                                                <hr>
                                                <h2>Cadastrar Sub Categoria</h2>
                                                <select name="fkcategoria">
                                                    <?php
                                                        foreach($categoria->findAll() as $key => $valcategoriasel): 
                                                            if($categoria->findAll() == NULL){
                                                                echo '<option>Nenhum dado Cadastrado!</option>';
                                                            }else{
                                                                echo '<option value="'.$valcategoriasel->categoria_id.'">'.$valcategoriasel->nome;
                                                                if($valcategoriasel->ativa): echo ' {ativo}'; else: echo ' {inativo}'; endif;
                                                                echo '</option>';
                                                            }
                                                        endforeach;
                                                    ?>
                                                </select><br><br>
                                                <input type="text" name="subcategoria" placeholder="Sub Categoria" />
                                                <input type="submit" name="InserirSubCat" class="btn btn-primary btn-block" value="Cadastrar Sub Categoria" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 text-center">
                                        <div class="row" style="overflow:auto">
                                            <div class="col-sm-6" style="overflow:auto">
                                                <h2>Categorias</h2>
                                                <table class="table">
                                                    <th>ID</th>
                                                    <th>Nome</th>
                                                    <th>Ativo</th>
                                                    <th>Ação</th>
                                                    <?php
                                                        foreach($categoria->findAll() as $key => $valcategoria): 
                                                            echo '<tr>';
                                                            if($categoria->findAll() == NULL){
                                                                echo 'Nenhum dado Cadastrado!';
                                                            }else{
                                                                echo '<td>'.$valcategoria->categoria_id.'</td>';
                                                                echo '<td class="text-left">'.$valcategoria->nome.'</td>';
                                                                echo '<td>';
                                                                    if($valcategoria->ativa == '1'):
                                                                        echo "<a href='painelcategoria.php?acaodesativaCat=altera&id=" . $valcategoria->categoria_id . "' title='Desativar?' onclick='return confirm(\"Deseja realmente alterar a categoria para Desativado - " . $valcategoria->nome . " ?\")'><i class='fa fa-check-square fa-2x text-success'></i></a>";
                                                                    else:
                                                                        echo "<a href='painelcategoria.php?acaoativaCat=altera&id=" . $valcategoria->categoria_id . "' title='Ativar?' onclick='return confirm(\"Deseja realmente alterar para Ativo a categoria - " . $valcategoria->nome . " ?\")'><i class='fa fa-ban fa-2x text-danger'></i></a>";
                                                                    endif;
                                                                echo '</td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' data-toggle='modal' data-target='#modalCategoria-".$valcategoria->categoria_id."'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='painelcategoria.php?acaoCategoria=deletar&id=" . $valcategoria->categoria_id . "' onclick='return confirm(\"Deseja realmente deletar " . $valcategoria->nome . " ?\")'>Deletar</a>";
                                                                echo '</td>';
                                                            }
                                                            echo '</tr>';
                                                        endforeach;
                                                    ?>
                                                </table>
                                            </div>
                                            <div class="col-sm-6" style="overflow:auto">
                                                <h2>Sub Categorias</h2>
                                                <table class="table">
                                                    <th>ID</th>
                                                    <th>Categoria</th>
                                                    <th>Nome</th>
                                                    <th>Ação</th>
                                                    <?php
                                                        foreach($subcategoria->findAll() as $key => $valsubcat): 
                                                            echo '<tr>';
                                                            if($subcategoria->findAll() == NULL){
                                                                echo 'Nenhum dado Cadastrado!';
                                                            }else{
                                                                echo '<td>'.$valsubcat->subcategoria_id.'</td>';
                                                                
                                                                    $resultadocategoria = $categoria->find($valsubcat->categoria_id); 
                                                                    
                                                                echo '<td class="text-left">'.$resultadocategoria->nome.'</td>';
                                                                echo '<td class="text-left">'.$valsubcat->nome.'</td>';
                                                                echo '<td>';
                                                                    echo "<a class='btn btn-info btn-medium btn-block' data-toggle='modal' data-target='#modalImgSlide-".$valsubcat->subcategoria_id."'>Editar</a>";
                                                                    echo "<a class='btn btn-danger btn-medium btn-block' href='painelcategoria.php?acaoSubcat=deletar&id=" . $valsubcat->subcategoria_id . "' onclick='return confirm(\"Deseja realmente deletar " . $valsubcat->nome . " ?\")'>Deletar</a>";
                                                                echo '</td>';
                                                            }
                                                            echo '</tr>';                                                            
                                                        endforeach;
                                                    ?>
                                                </table>
                                                <?php foreach($subcategoria->findAll() as $key => $valsubcat2): ?>
                                                    <div class="modal fade" id="modalImgSlide-<?php echo $valsubcat2->subcategoria_id; ?>" tabindex="-1" role="dialog" aria-labelledby="modalImgSlide-<?php echo $valsubcat2->subcategoria_id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form method="post" action="" enctype="multipart/form-data">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Painel de Sub Categoria [Edição]</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="shopper-info">
                                                                            <label>ID</label>
                                                                            <input type="text" class="text-center" name="idedit" readonly value="<?php echo $valsubcat2->subcategoria_id; ?>">
                                                                            
                                                                            <?php $resultadocategoria = $categoria->find($valsubcat2->categoria_id); ?>
                                                                            
                                                                            <input type="text" class="text-center" readonly value="<?php echo 'Categoria -> '.$resultadocategoria->nome; ?>">
                                                                            <input type="text" class="form-control" name="subcategoriaedit" value="<?php echo $valsubcat2->nome; ?>" placeholder="Nome Sub Categoria" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="submit" name="AlterarSubCat" class="btn btn-warning btn-lg" value="Alterar">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                                <?php foreach($categoria->findAll() as $key => $valcat2): ?>
                                                    <div class="modal fade" id="modalCategoria-<?php echo $valcat2->categoria_id; ?>" tabindex="-1" role="dialog" aria-labelledby="modalCategoria-<?php echo $valcat2->categoria_id; ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form method="post" action="" enctype="multipart/form-data">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Painel de Categoria [Edição]</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="shopper-info">
                                                                            <label>ID</label>
                                                                            <input type="text" class="text-center" readonly name="id2edit" value="<?php echo $valcat2->categoria_id; ?>">
                                                                            <input type="text" class="form-control" name="categoriaedit" value="<?php echo $valcat2->nome; ?>" placeholder="Categoria" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="submit" name="AlterarCat" class="btn btn-warning btn-lg" value="Alterar">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
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
