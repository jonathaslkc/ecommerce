<?php
    $titulopage = 'Contato - Templax E-commerce';
    $nomemenu   = 'contato';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'header/head.php'; ?>
</head><!--/head-->

<body>
	
        <?php include_once 'header.php'; ?>
	 
        <div id="contact-page" class="container">
    	<div class="bg">
            <div class="row">    		
                <div class="col-sm-12">    			   			
                    <h2 class="title text-center">Contato</h2>
                    <div id="gmap" class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9317.21740202286!2d-37.10782768214059!3d-10.932569879570424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71ab26b000000005%3A0xede3fa6b646f66ce!2sSergipeTec!5e0!3m2!1spt-BR!2sbr!4v1475589079916" 
                        height="350" frameborder="0" style="border:0;width:100%;" allowfullscreen></iframe>
                    </div>
                </div>			 		
            </div>    	
            <div class="row">  	
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Formulário de Contato</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Nome">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Motivo do Contato">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Mensagem"></textarea>
                            </div>                        
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Enviar">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Informações de Contato</h2>
                        <address>
                            <p>E-Shopper - SergipeTec</p>
                            <p>Av. José Conrado de Araújo, 731 - Rosa Elze, 49100-000</p>
                            <p>São Cristóvão - SE (BR)</p>
                            <p>Telefone: +55 79 9999-2058</p>
                            <p>Fax: 55 79 9999-2058</p>
                            <p>Email: suporte@templax.com.br</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Redes Sociais</h2>
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    			
            </div>  
    	</div>	
    </div><!--/#contact-page-->
	
    <?php include_once 'footer.php'; ?>
	

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>