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
        include '../controller/produtoinsert.control.php';
        
    // Update
        #include '../controller/itensupdate.control.php';
        
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
                                <li class="active">Painel Ítens</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Painel Ítem</h3>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-8">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Cadastrar Ítem</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações Gerais</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <label>Nome</label>
                                                        <input type="text" name="nome" id="vbv" placeholder="Digite aqui o nome..." />
                                                        <label>Marca</label>
                                                        <input type="text" name="marca" placeholder="Digite aqui a marca..." />
                                                        <div class="row text-center">
                                                            <div class="col-sm-4">
                                                                <label>Tamanho</label>
                                                                <input type="text" name="tamanho" placeholder="Ex.: P, M, G... 36, 38, 40..." />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Modelo</label>
                                                                <input type="text" name="modelo" placeholder="Digite aqui o modelo..." />
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Cor (clique para selecionar)</label>
                                                                <input type="color" name="cor" />
                                                            </div>
                                                        </div>
                                                        <div class="row text-center">
                                                            <div class="col-sm-6">
                                                                <label>Categoria</label>
                                                                <select id="passaValor" name="passaValor" onchange="getValor(this.value, 0)" class="input-block-level">
                                                                    <option value="0">Selecione a Categoria</option>
                                                                        <?php foreach($categoria->findAll() as $key => $valCatList): ?>
                                                                            <?php echo "<option value='".$valCatList->categoria_id."'>".$valCatList->nome."</option>" ?>
                                                                        <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>SubCategoria</label>
                                                                <select name="recebeValor" id="recebeValor" class="input-block-level">
                                                                    <option value="">Escolher</option>
                                                                </select><br><br>
                                                            </div>
                                                        </div>
                                                        <label>Descrição</label>
                                                        <textarea name="descricao" placeholder="Adicione uma descrição para o ítem [limite de 255 caractéris]..." maxlength="255"></textarea><br><br>
                                                        <label>NCM</label>
                                                        <select name="ncm_id"  class="input-block-level" size="5">
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
                                                
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Imagem para Anexar ao Ítem</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row text-center">
                                                            <h3>Imagem Principal</h3>
                                                            <div class="col-sm-6">
                                                                <label>Adicionar Imagem do Computador, ou...</label>
                                                                <input type="file" name="CIfr" accept="image/*">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Adicionar de Imagem Existente</label>
                                                                <input type="text" name="caminho_img_frente" placeholder="Cole aqui o caminho da imagem...">
                                                            </div>
                                                        </div>
                                                        <div class="row text-center">
                                                            <h3>Imagem Adicional #1</h3>
                                                            <div class="col-sm-6">
                                                                <label>Adicionar Imagem do Computador, ou...</label>
                                                                <input type="file" name="CIla" accept="image/*">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Adicionar de Imagem Existente</label>
                                                                <input type="text" name="caminho_img_lateral" placeholder="Cole aqui o caminho da imagem...">
                                                            </div>
                                                        </div>
                                                        <div class="row text-center">
                                                            <h3>Imagem Adicional #2</h3>
                                                            <div class="col-sm-6">
                                                                <label>Adicionar Imagem do Computador, ou...</label>
                                                                <input type="file" name="CIfu" accept="image/*">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Adicionar de Imagem Existente</label>
                                                                <input type="text" name="caminho_img_fundo" placeholder="Cole aqui o caminho da imagem...">
                                                            </div>
                                                        </div>
                                                        <h5 class="text-danger">PS: Para melhor visualização final, tente inserir uma imagem com proporções iguais das laterais. Ex.: 680x680px. <br> Só serão permitidas imagens com até 1mb e com extensões JPG ou PNG.</h5>
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações de Custeio e Preço</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row text-center">
                                                            <div class="col-sm-4">
                                                                <label>Preço de Venda</label>
                                                                <input type="text" name="preco_venda" id="preco_venda"  placeholder="0.00">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Preço de Compra</label>
                                                                <input type="text" name="preco_compra" id="preco_compra" placeholder="0.00">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Preço de Custo</label>
                                                                <input type="text" name="preco_custo" id="preco_custo" placeholder="0.00">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Preço de Promocional</label>
                                                                <input type="text" name="preco_promocional" id="preco_promocional" placeholder="0.00">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Desconto (%)</label>
                                                                <input type="text" name="desconto" id="desconto" placeholder="Porcentagem">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Peso e Dimensões do Ítem</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row text-center">
                                                            <div class="col-sm-3">
                                                                <label>Peso (Kg)</label>
                                                                <input type="text" name="peso" id="peso" placeholder="Digite valor em Kg" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Altura (cm)</label>
                                                                <input type="text"  name="altura" id="altura" placeholder="Digite valor em cm" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Largura (cm)</label>
                                                                <input type="text"  name="largura" id="largura" placeholder="Digite valor em cm" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Profundidade (cm)</label>
                                                                <input type="text" name="profundidade" id="profundidade" placeholder="Digite valor em cm" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações do Código de Barras</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row text-center">
                                                            <div class="col-sm-6">
                                                                <label>Código de  Barras</label>
                                                                <input type="text" name="codbarra_id" placeholder="Digite aqui" />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Fornecedor</label>
                                                                <select name="fornecedor_id" class="input-block-level" size="5">
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
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Outras Informações</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row text-center">
                                                            <div class="col-sm-4">
                                                                <label>Promocional? </label>
                                                                <select name="promocional">
                                                                    <option value="1">Sim</option>
                                                                    <option value="0" selected>Não</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Destaque? </label>
                                                                <select name="destacar_site">
                                                                    <option value="1">Sim</option>
                                                                    <option value="0" selected>Não</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Ativo? </label>
                                                                <select name="ativo">
                                                                    <option value="1">Sim</option>
                                                                    <option value="0" selected>Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="submit" name="InserirItem" class="btn btn-primary btn-block" value="Cadastrar Ítem" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <h2>Comandos Atalho</h2>
                                        <a href="#" onclick="window.open('gallery-page.php?gallery=itens', 'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"><i class="btn btn-lg fa fa-5x fa-picture-o"></i> Ver Galeria</a><br><br>
                                        <a href="#" onclick="window.open('ncm.php', 'Cadastro de NCM', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=500, HEIGHT=600');"><i class="btn btn-lg fa fa-5x fa-plus"></i> Cadastrar NCM </a><br><br>
                                        <a href="listagem-ncm.php" target="_blank"><i class="btn btn-lg fa fa-5x fa-list-alt"></i> Todos os NCM</a><br>
                                        <a href="painelcategoria.php"><i class="btn btn-lg fa fa-5x fa-pencil-square-o"></i> Ver Categoria</a><br><br>
                                        <a href="listagem-fornecedores.php"><i class="btn btn-lg fa fa-5x fa-bookmark-o"></i> Todos os Fornecedores</a><br><br>
                                        <a href="listagem-itens.php" target="_blank"><i class="btn btn-lg fa fa-5x fa-list-alt"></i> Todos os Ítens</a>
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
                $("#recebeValor").load("../controller/ajaxCatSub.php",{id:valor});
            }, 500);
    };
    </script>
    
    <script src="../web/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({ 
            selector: "textarea",
            plugins : 'advlist autolink link lists charmap print preview wordcount visualchars'
        });
    </script>
    
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script src="../web/js/jquery.maskMoney.js"></script>
    <script src="../web/js/mascaras.js"></script>
    
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
