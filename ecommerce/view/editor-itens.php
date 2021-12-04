<?php
    $titulopage = 'ADM Ecommerce - Editor Ítens';
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
        #include '../controller/produtoinsert.control.php';
        
    // Update
        include '../controller/produtoupdate.control.php';
        
    // Select
        include '../controller/produtoselect.control.php';
    
    // Delete
        include '../controller/produtodelete.control.php';
        
    // Update CÓDIGO DE BARRAS
    include '../controller/codbarrasupdate.control.php';

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
                                <li><a href="listagem-itens.php">Listagem de Ítens</a></li>
                                <li class="active">Editor de ítens</li>
                            </ol>
			</div><!--/breadcrums-->
                        <div class="single-blog-post">
                            <h3>Painel Produto</h3>
                            <br>
                            <div class="category-tab shop-details-tab"><!--category-tab-->
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active"><a data-toggle="tab" href="#geral"><i class="fa fa-home"></i> Informações Gerais</a></li>
                                <li><a data-toggle="tab" href="#ferimg"><i class="fa fa-picture-o"></i> Imagens</a></li>
                                <li><a data-toggle="tab" href="#cuspre"><i class="fa fa-dollar"></i> Preço e Custo</a></li>
                                <li><a data-toggle="tab" href="#pesdi"><i class="fa fa-expand"></i> Peso e Dimensões</a></li>
                                <li><a data-toggle="tab" href="#codbar"><i class="fa fa-barcode"></i> Código de Barras</a></li>
                                <li><a data-toggle="tab" href="#outinf"><i class="fa fa-plus"></i> Mais</a></li>
                            </ul>

                            <div class="tab-content">
                                <?php echo msg($msgreturn, $tipo); ?>
                                <div id="geral" class="tab-pane fade in active">
                                    <div class="container">
                                        <div class="row text-center">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <form method="POST">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Informações Gerais</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Nome</label>
                                                            <input type="text" name="nome" id="vbv" value="<?php echo $resultado->nome; ?>" placeholder="Digite aqui o nome..." />
                                                            <div class="row text-center">
                                                                <div class="col-sm-6">
                                                                    <label>Categoria</label>
                                                                    <input type="text" name="normalCat" value="<?php echo $resultado->categoria_id; ?>" hidden>
                                                                    <input type="text" value="<?php echo $resultadoccategoria->nome; ?>" readonly>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>SubCategoria</label>
                                                                    <input type="text" name="normalSubC" value="<?php echo $resultado->subcategoria_id; ?>" hidden>
                                                                    <input type="text" value="<?php echo $resultadosubcategoria->nome; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row text-center">
                                                                <div class="col-sm-12">
                                                                    <a href="#catesubcat" data-toggle="collapse" class="btn btn-warning">Alterar Categoria e Subcategoia</a><br><br>
                                                                </div>
                                                                <div id="catesubcat" class="collapse">
                                                                    <div class="col-sm-6">
                                                                        <label>Categoria</label>
                                                                        <select id="passaValor" name="passaValor" onchange="getValor(this.value, 0)" class="input-block-level btn btn-warning">
                                                                            <option value="0">Selecione a Categoria</option>
                                                                                <?php foreach($categoria->findAll() as $key => $valCatList): ?>
                                                                                    <?php echo "<option value='".$valCatList->categoria_id."'>".$valCatList->nome."</option>" ?>
                                                                                <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label>SubCategoria</label>
                                                                        <select name="recebeValor" id="recebeValor" class="input-block-level btn btn-warning">
                                                                            <option value="">Escolher</option>
                                                                        </select><br><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <label>Descrição</label>
                                                            <textarea name="descricao" placeholder="Adicione uma descrição para o ítem [limite de 255 caractéris]..." maxlength="255"><?php echo $resultado->descricao; ?></textarea><br><br>
                                                            <label>NCM</label>
                                                            <input type="text" name="normalNCM" value="<?php echo $resultado->ncm_id; ?>" readonly>
                                                            <div class="col-sm-12">
                                                                <a href="#ncmmostra" data-toggle="collapse" class="btn btn-warning">Alterar NCM</a><br><br>
                                                            </div>
                                                            <div id="ncmmostra" class="collapse">
                                                                <div class="col-sm-12">
                                                                    <label>NCM</label>
                                                                    <select name="ncm_id"  class="input-block-level btn btn-warning" size="5">
                                                                        <?php
                                                                            if (empty($ncm->findAllId())):
                                                                                echo "<optgroup label='Nenhum NCM cadastrado!'></optgroup>";
                                                                            else:
                                                                                foreach($ncm->findAllId() as $key => $valNcm):
                                                                                    echo "<option value='".$valNcm->ncm_id."'>".$valNcm->ncm_id." - ".$valNcm->nome."</option>";
                                                                                endforeach;
                                                                            endif;
                                                                        ?>
                                                                    </select>  
                                                                </div>
                                                            </div>
                                                            <br><hr>
                                                            <input type="submit" name="altInfoGerais" class="btn btn-primary btn-block" value="Alterar Informações Gerais" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ferimg" class="tab-pane fade">
                                    <div class="container">
                                        <div class="row text-center">
                                            <h3>Ferramentas de Imagem</h3>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-7">
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Imagem para Anexar ao Ítem</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row text-center">
                                                                <h3>Imagem Principal</h3>
                                                                <div class="col-sm-5">
                                                                    <label>Add Imagem do Computador, ou...</label>
                                                                    <input type="file" name="CIfr" accept="image/*">
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <label>Add de Imagem Existente</label>
                                                                    <input type="text" name="caminho_img_frente" placeholder="Cole aqui o caminho da imagem...">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label>Padrão</label>
                                                                    <input type="checkbox" name="caminhoImgPadraoFrente">
                                                                </div>
                                                            </div>
                                                            <div class="row text-center">
                                                                <h3>Imagem Adicional #1</h3>
                                                                <div class="col-sm-5">
                                                                    <label>Add Imagem do Computador, ou...</label>
                                                                    <input type="file" name="CIla" accept="image/*">
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <label>Add de Imagem Existente</label>
                                                                    <input type="text" name="caminho_img_lateral" placeholder="Cole aqui o caminho da imagem...">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label>Padrão</label>
                                                                    <input type="checkbox" name="caminhoImgPadraoLateral">
                                                                </div>
                                                            </div>
                                                            <div class="row text-center">
                                                                <h3>Imagem Adicional #2</h3>
                                                                <div class="col-sm-5">
                                                                    <label>Add Imagem do Computador, ou...</label>
                                                                    <input type="file" name="CIfu" accept="image/*">
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <label>Add de Imagem Existente</label>
                                                                    <input type="text" name="caminho_img_fundo" placeholder="Cole aqui o caminho da imagem...">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label>Padrão</label>
                                                                    <input type="checkbox" name="caminhoImgPadraoFundo">
                                                                </div>
                                                            </div>
                                                            <input type="text" name="caminho_img_frenteOrig" value="<?php echo $resultado->caminho_img_frente; ?>" hidden>
                                                            <input type="text" name="caminho_img_lateralOrig" value="<?php echo $resultado->caminho_img_lateral; ?>" hidden>
                                                            <input type="text" name="caminho_img_fundoOrig" value="<?php echo $resultado->caminho_img_fundo; ?>" hidden>
                                                            <h5 class="text-danger">PS: Para melhor visualização final, tente inserir uma imagem com proporções iguais das laterais. Ex.: 680x680px. <br> Só serão permitidas imagens com até 1mb e com extensões JPG ou PNG.</h5>
                                                            <input type="submit" name="altImgCom" class="btn btn-primary btn-block" value="Realizar Upload da Imagem" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-3">
                                                <h2>Imagens</h2>
                                                <div class="col-sm-12 text-center">
                                                    <h4>-> Principal</h4>
                                                    <div class="form-control text-center" style="width:200px;height:100%;margin:20px 0px 0px 0px">
                                                        <img src='<?php echo '../'.$resultado->caminho_img_frente; ?>' style="width:190px;">
                                                    </div>
                                                </div><br><br><br>
                                                <div class="col-sm-12 text-center" style=" clear: both">
                                                    <h4>-> Adicional #1</h4>
                                                    <div class="form-control text-center" style="width:200px;height:100%;margin:20px 0px 0px 0px">
                                                        <img src='<?php echo '../'.$resultado->caminho_img_lateral; ?>' style="width:190px;">
                                                    </div>
                                                </div><br><br><br>
                                                <div class="col-sm-12 text-center" style=" clear: both">
                                                    <h4>-> Adicional #2</h4>
                                                    <div class="form-control text-center" style="width:200px;height:100%;margin:20px 0px 0px 0px">
                                                        <img src='<?php echo '../'.$resultado->caminho_img_fundo; ?>' style="width:190px;">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 text-center">
                                                    <h2>Atalhos</h2>
                                                    <a href="#" onclick="window.open('gallery-page.php?gallery=itens', 'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"><i class="btn btn-lg fa fa-5x fa-picture-o"></i> Ver Galeria</a><br><br>
                                                </div>
                                            </div>
                                            <div class="col-sm-1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="cuspre" class="tab-pane fade">
                                    <div class="container">
                                        <div class="row text-center">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <form method="POST">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Informações de Custeio e Preço</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row text-center">
                                                                <div class="col-sm-4">
                                                                    <label>Preço de Venda</label>
                                                                    <input type="text" name="preco_venda" id="preco_venda" value="<?php echo number_format ($resultadopreco->preco_venda,2,".",""); ?>"  placeholder="0.00">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label>Preço de Compra</label>
                                                                    <input type="text" name="preco_compra" id="preco_compra" value="<?php echo number_format ($resultadopreco->preco_compra,2,".",""); ?>"  placeholder="0.00">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label>Preço de Custo</label>
                                                                    <input type="text" name="preco_custo" id="preco_custo" value="<?php echo number_format ($resultadopreco->preco_custo,2,".",""); ?>"  placeholder="0.00">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>Preço de Promocional</label>
                                                                    <input type="text" name="preco_promocional" id="preco_promocional" value="<?php echo number_format ($resultadopreco->preco_promocional,2,".",""); ?>"  placeholder="0.00">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>Desconto (%)</label>
                                                                    <input type="text" name="desconto" id="desconto" value="<?php echo number_format ($resultadopreco->desconto,2,".",""); ?>"  placeholder="Porcentagem">
                                                                </div>
                                                            </div>
                                                            <input type="submit" name="altCusPre" class="btn btn-primary btn-block" value="Alterar Custeio e Preço" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="pesdi" class="tab-pane fade">
                                    <div class="container">
                                        <div class="row text-center">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <form method="POST">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Peso e Dimensões do Ítem</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row text-center">
                                                                <div class="col-sm-3">
                                                                    <label>Peso (Kg)</label>
                                                                    <input type="text" name="peso" id="peso" value="<?php echo number_format ($resultado->peso,3,".",""); ?>"  placeholder="Digite valor em Kg" />
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label>Altura (cm)</label>
                                                                    <input type="text"  name="altura" id="altura" value="<?php echo number_format ($resultado->altura,3,".",""); ?>"  placeholder="Digite valor em cm" />
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label>Largura (cm)</label>
                                                                    <input type="text"  name="largura" id="largura" value="<?php echo number_format ($resultado->largura,3,".",""); ?>"  placeholder="Digite valor em cm" />
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label>Profundidade (cm)</label>
                                                                    <input type="text" name="profundidade" id="profundidade" value="<?php echo $resultado->profundidade; ?>"  placeholder="Digite valor em cm" />
                                                                </div>
                                                            </div>
                                                            <input type="submit" name="altPesDim" class="btn btn-primary btn-block" value="Alterar Peso e Dimensões" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="codbar" class="tab-pane fade">
                                    <div class="container">
                                        <div class="row text-center">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <form method="POST">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Informações do Código de Barras</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row text-center">
                                                                
                                                                <?php
                                                                    if (empty($barra->findAll2($resultado->produto_id))):
                                                                        echo "<h4>Nenhum Código de Barras Cadastrado!</h4>";
                                                                    else:
                                                                        foreach($barra->findAll2($resultado->produto_id) as $key => $valCodBarras): ?>
                                                                        
                                                                            <div class="col-sm-5">
                                                                                <label>Código de  Barras</label>
                                                                                <input type="text" name="codbarra_id" value="<?php echo $valCodBarras->codbarra_id; ?>" readonly />
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <label>Fornecedor</label>
                                                                                <?php $resultFornCB    = $fornecedor->find($valCodBarras->fornecedor_id); ?>
                                                                                <input type="text" value="<?php echo $resultFornCB->cnpj.' - '.$resultFornCB->fantasia; ?>" readonly>
                                                                            </div>
                                                                            <div class="col-sm-2">
                                                                                <a class="btn btn-danger btn-block" href="editor-itens.php?acao=editar&id=<?php echo $resultado->produto_id; ?>&acaoCodBarras2=deletar&id2=<?php echo $valCodBarras->codbarra_id; ?>" onclick="return confirm('Deseja realmente desvincular o Código de Barras - <?php echo $valCodBarras->codbarra_id; ?>? \nEsta ação fará a exclusão do mesmo!');">Desvincular</a>
                                                                                <a href="#codbarramostra<?php echo $valCodBarras->codbarra_id; ?>" data-toggle="collapse" data-parent="#accordion" class="btn btn-warning btn-block"><i class="fa fa-plus"></i> Infor</a>
                                                                            </div>                                                                                                                                                                          

                                                                            <div id="codbarramostra<?php echo $valCodBarras->codbarra_id; ?>" class="panel-collapse collapse">
                                                                                <div class="col-sm-3">
                                                                                    <label>Marca</label>
                                                                                    <input type="text" readonly name="marca" value="<?php echo $valCodBarras->marca; ?>" />
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <label>Tamanho</label>
                                                                                    <input type="text" readonly name="tamanho" value="<?php echo $valCodBarras->tamanho; ?>" />
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <label>Modelo</label>
                                                                                    <input type="text" readonly name="modelo" value="<?php echo $valCodBarras->modelo; ?>" />
                                                                                </div>
                                                                                <div class="col-sm-1">
                                                                                    <label>Cor</label>
                                                                                    <div style="border-radius:50%; -moz-border-radius:50%; -webkit-border-radius:50%; background:<?php echo $valCodBarras->cor; ?>"> . </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="col-sm-2"></div>
                                                                                    <div class="col-sm-8">
                                                                                        <br><br><a href="listagem-codbarras.php?ActionEditPanel=yes&ident=<?php echo md5($valCodBarras->codbarra_id); ?>" class="btn btn-info btn-lg btn-block" target="_blank">Editar Código de Barras</a>
                                                                                    </div>
                                                                                    <div class="col-sm-2"></div>    
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <br><hr style="border:5px solid #FC9A11"><br>
                                                                            </div>

                                                                        <?php endforeach;
                                                                    endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="outinf" class="tab-pane fade">
                                    <div class="container">
                                        <div class="row text-center">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <form method="POST">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Outras Informações</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row text-center">
                                                                <div class="col-sm-4">
                                                                    <label>Promocional? </label>
                                                                    <select name="promocional">
                                                                        <option value="1" <?php if($resultado->promocional): echo ' selected'; endif; ?>>Sim</option>
                                                                        <option value="0" <?php if(!$resultado->promocional): echo ' selected'; endif; ?>>Não</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label>Destaque? </label>
                                                                    <select name="destacar_site">
                                                                        <option value="1" <?php if($resultado->destacar_site): echo ' selected'; endif; ?>>Sim</option>
                                                                        <option value="0" <?php if(!$resultado->destacar_site): echo ' selected'; endif; ?>>Não</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label>Ativo? </label>
                                                                    <select name="ativo">
                                                                        <option value="1" <?php if(!$resultado->ativo): echo ' selected'; endif; ?>>Sim</option>
                                                                        <option value="0" <?php if(!$resultado->ativo): echo ' selected'; endif; ?>>Não</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="submit" name="altMaisInfo" class="btn btn-primary btn-block" value="Alterar Mais Informações" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div><!--/category-tab-->
                            
                        
                        </div><!--/blog-post-area-->
                        
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
                $("#recebeValor").load("../controller/ajaxCatSub.php",{id:valor});
            }, 500);
    };
    </script>
    
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script src="../web/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({ 
            selector: "textarea",
            plugins : 'advlist autolink link lists charmap print preview wordcount visualchars'
        });
    </script>
    <script src="../web/js/jquery.maskMoney.js"></script>
    <script src="../web/js/mascaras.js"></script>
    
</body>
</html>
