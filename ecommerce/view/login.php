<?php
    $titulopage = 'Administrativo - Templax E-commerce';
    $nomemenu   = 'admin';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <!-- Incremento do head -->
    <?php include_once 'header/head.php'; ?>
    <!-- /head -->
    
</head>

<body>

    <?php include_once 'header.php'; ?>

	<section><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <div class="login-form"><!--login form-->
                            <h2>Acesso Administrativo</h2>
                            <?php echo msg($msgreturn, $tipo); ?>
                            <form action="" method="POST">
                                <input type="text" name="login" placeholder="Login" />
                                <input type="password" name="senha" placeholder="Senha" />
<!--                                <span>
                                    <input type="checkbox" class="checkbox"> 
                                    Permanecer Conectado
                                </span>-->
                                <a href="acesso.php" class="text-warning">Clique aqui para logar como usuário-cliente</a>
                                <button type="submit" name="logar" class="btn btn-default">Logar</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
        </section><!--/form--><br>
	
	<?php include_once 'footer.php'; ?>

  
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
</body>
</html>