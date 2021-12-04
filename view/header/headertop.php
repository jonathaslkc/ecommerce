<div class="header_top"><!--header_top-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="contactinfo">
                    <ul class="nav nav-pills">
                        <li><a href="#"><i class="fa fa-phone"></i> +55 79 99998-5015</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> suporte@templax.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="social-icons pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="http://www.facebook.com.br/templax" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li>
                            <a 
                                <?php 
                                    if (@$_SESSION['logado'] == 0): 
                                        echo ' href="http://localhost/ecommerce/view/login.php" '; 
                                    else: 
                                        if (@$_SESSION['usuarioadm']): 
                                            echo ' href="http://localhost/ecommerce/view/administrativo.php" '; 
                                        else: 
                                            echo ' href="http://localhost/ecommerce/view/minha-conta.php" '; 
                                        endif; 
                                    endif;
                                ?>>
                                <i class="fa fa-lock"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header_top-->