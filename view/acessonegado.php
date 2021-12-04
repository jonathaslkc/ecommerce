<?php
    $titulopage = 'Acesso Negado! - Página solicitada não autorizada';
    $nomemenu   = 'inicio';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <?php include_once 'header/head.php'; ?>
    
</head><!--/head-->

<body>

    <?php include_once 'header.php'; ?>

        <div class="container text-center">
		<div class="content-404">
                        <img src="../web/images/accneg/accneg.jpg" style="width:200px" class="img-responsive" alt="" />
			<h1><b>OPS!</b> Você não possui permissão suficiente para continuar ;(<h1>
                        <p>"Vim parar aqui acidentalmente. Me retorne para a página inicial." <a href='../index.php'>(Retornar)</a></p><br>
		</div>
	</div>
	
    <?php include_once 'footer.php'; ?>
  


<!-- Scripts -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    
<!-- /Scripts -->
</body>
</html>