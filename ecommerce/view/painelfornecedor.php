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
    
    // Insert
        include '../controller/fornecedorinsert.control.php';

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
                                <li class="active">Painel Fornecedor</li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Painel Fornecedor</h3>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-8">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Cadastrar Fornecedor</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="" name="formCadEmpresa" id="formCadEmpresa" enctype="multipart/form-data">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações Gerais</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <label>CNPJ</label>
                                                        <input type="text" class="text-center" id="cpfcnpj" name="cnpj" required placeholder="Digite o CNPJ (somente números)" maxlength="14" />
                                                        <div id="msgerrocc" hidden><h4 style="border:2px solid;border-radius:5px;" class="box text-danger">Inválido!<br> Por favor, digite um CNPJ válido!</h4></div>
                                                        <div class="row text-center">
                                                            <div class="col-sm-6">
                                                                <label>Inscrição Estadual</label>
                                                                <input type="text" name="estadual" id="estadual" placeholder="Digite aqui" />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Inscrição Municipal</label>
                                                                <input type="text" name="municipal" id="municipal" placeholder="Digite aqui" />
                                                            </div>
                                                        </div>
                                                        <label>Razão Social</label>
                                                        <input type="text" name="razao" required placeholder="Nome *Razão da empresa" />
                                                        <label>Nome Fantasia</label>
                                                        <input type="text" name="fantasia" required placeholder="Nome *Fantasia da empresa" />
                                                        <label>Adicionar Imagem (logotipo)</label>
                                                        <input type="file" name="foto" accept="image/*">
                                                        <div class="text-left"><label class="text-danger">Obs.: Imagem com até 2mb de tamanho.</label></div>
                                                    </div>
                                                </div>
                                                
                                                <input type="submit" id="btnproximo" name="cadastrarfornecedor" class="btn btn-primary btn-block" value="Cadastrar Fornecedor" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <h2>Comandos Atalho</h2>
                                        <a href="listagem-fornecedores.php" target="_blank"><i class="btn btn-lg fa fa-5x fa-list-alt"></i> Todos os Fornecedores</a>
                                        <a href="painelitens.php"><i class="btn btn-lg fa fa-5x fa-reply"></i> Ir para Cadastro de Ítens</a>
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
    
    <script src="../web/js/exemplo_3.js"></script>
    <script src="../web/js/valida_cpf_cnpj.js"></script>
    
</body>
</html>
