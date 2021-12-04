<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2>Templax</h2>
                        <p>A Templax Tecnologia é uma empresa que presta soluções corporativas em TI [sob medida] para outras empresas...</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="http://localhost/ecommerce/web/images/home/map.png" alt="" />
                        <p>Parque Tecnológico de Sergipe<br>
                        Av. José Conrado de Araújo, 731<br>
                        Rosa Elze - São Cristóvão / SE</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
		
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="single-widget">
                        <h2>Negócio</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Início</a></li>
                            <li><a href="#">Sobre Nós</a></li>
                            <li><a href="#">Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Email</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Insira seu email aqui" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Cadastre seu email aqui para <br /> receber nossas promoções!</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left"><a target="_blank" <?php if (@$_SESSION['logado'] <> 0): echo 'href="http://localhost/ecommerce/view/administrativo.php"'; else: echo 'href="http://localhost/ecommerce/index.php"'; endif; ?>><img src="http://localhost/ecommerce/web/images/home/templax.png"></a></p>
                <p class="pull-right">Designed de <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->