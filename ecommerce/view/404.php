<?php
    $titulopage = '404 - Página não encontrada';
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
		<div class="logo-404">
			<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="images/404/404.png" class="img-responsive" alt="" />
			<h1><b>OPS!</b> Nós não conseguimos encontrar essa página ;(<h1>
                        <p>Uh.. Caso você ache que esta mensagem não deveria está aqui, informe ao WebMaster sobre... <a href='contato.php'>(Clique aqui)</a></p>
			<h2><a href="index.php">Retornar para a página inicial</a></h2>
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