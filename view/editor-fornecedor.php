<?php
    $titulopage = 'ADM Ecommerce - Editor Fornecedor';
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
    
    // Update
        include '../controller/fornecedorupdate.control.php';
    
    // Select
        include '../controller/fornecedorselect.control.php';

?>

<body>
    <?php include_once 'header.php'; ?>
    
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Painel Administrativo</h2>
                        
                        <div class="single-blog-post">
                            <h3>Painel Fornecedor</h3>
                            <br>
                            <div class="container">
                                <div class="row text-center">
                                    <div class="col-sm-8">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Editar Fornecedor</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="" name="formCadEmpresa" id="formCadEmpresa" enctype="multipart/form-data">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações Gerais</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <label>CNPJ</label>
                                                        <input type="text" class="text-center" id="cpfcnpj" readonly name="cnpj" value="<?php echo $resultado->cnpj; ?>" required placeholder="Digite o CNPJ (somente números)" maxlength="14" />
                                                        <div id="msgerrocc" hidden><h4 style="border:2px solid;border-radius:5px;" class="box text-danger">Inválido!<br> Por favor, digite um CNPJ válido!</h4></div>
                                                        <div class="row text-center">
                                                            <div class="col-sm-6">
                                                                <label>Inscrição Estadual</label>
                                                                <input type="text" name="estadual" id="estadual" value="<?php echo $resultado->insc_estadual; ?>" placeholder="Digite aqui" />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Inscrição Municipal</label>
                                                                <input type="text" name="municipal" id="municipal" value="<?php echo $resultado->insc_municipal; ?>" placeholder="Digite aqui" />
                                                            </div>
                                                        </div>
                                                        <label>Razão Social</label>
                                                        <input type="text" name="razao" value="<?php echo $resultado->razao_social; ?>" required placeholder="Nome *Razão da empresa" />
                                                        <label>Nome Fantasia</label>
                                                        <input type="text" name="fantasia" value="<?php echo $resultado->fantasia; ?>" required placeholder="Nome *Fantasia da empresa" />
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Outras Informações</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <label>Informações</label><br>
                                                        <div class="text-left">
                                                            <label class="text-danger">I - Os campos com o ' *  ' (asterisco) são de preenchimento obrigatório!</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <input type="submit" name="editarfornecedor" class="btn btn-primary btn-block" value="Editar Fornecedor" />
                                                
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <h2>Comandos Adicionais</h2>
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-4 text-center">
                                                    <div class="form-control text-center" style="width:220px;height:100%;margin:20px 0px 0px 0px">
                                                        <img src='<?php echo '../'.$resultado->imagem; ?>' style="width:200px;">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-12"><br>
                                                    <label>Alterar Foto</label>
                                                    <input type="file" name="foto" accept="image/*">
                                                    <div class="text-danger text-left">Obs.: Imagem com até 2mb de tamanho.</div>
                                                </div>
                                            </div>
                                            <input type="submit" name="editarfornecedorfoto" class="btn btn-primary btn-block" value="Alterar Imagem" />
                                        </form>
                                    </div>
                            </div><br>
                        </div>
                    </div><!--/blog-post-area-->
                        
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
    
    <script src="../web/js/validatepassword.js"></script>
    <script type="text/javascript" src="../web/js/buscaCep2.js"></script>
    
</body>
</html>
