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
        #include '../controller/ncmupdate.control.php';
        
    // Delete
        #include '../controller/ncmdelete.control.php';

?>

<body>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Painel Administrativo</h2>
                        <?php echo msg($msgreturn, $tipo); ?>
                        <div class="breadcrumbs text-right">
                            <ol class="breadcrumb">
                                <li><button class="btn btn-primary" id="btnclose">Fechar Pop-up</button></li>
                            </ol>
			</div><!--/breadcrums-->
                        
                        <div class="single-blog-post">
                            <h3>Cadastro de NCM</h3>
                            <br>
                            <div class="container" >
                                <div class="row text-center">
                                    <div class="col-sm-2"></div>
                                    
                                    <div class="col-sm-8 text-left">
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
                                    </div>
                                    
                                    <div class="col-sm-2"></div>
                                </div>
                            </div><br>
                        </div>
                    </div><!--/blog-post-area-->
                </div>
            </div>
        </div>
    </section>

       
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script>
        document.getElementById('btnclose').addEventListener('click', function(){
            window.close();
        }, false);
    </script>
    
</body>
</html>