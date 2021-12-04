<div <?php if((@$_SESSION['logado'] <> 0) && (@$_SESSION['logadoadm'] <> 0)): echo ' hidden '; endif; ?> class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li>
                            <?php
                            if (($url_atual == 'http://localhost/ecommerce/index.php') || ($url_atual == 'http://localhost/ecommerce/') || ($url_atual == 'http://localhost/ecommerce')):
                            ?>
                                <a href="index.php" <?php if (@$nomemenu == 'inicio'): echo ' class="active" '; endif; ?>>Início</a>
                            <?php
                            else:
                            ?>
                                <a href="../index.php" <?php if (@$nomemenu == 'inicio'): echo ' class="active" '; endif; ?>>Início</a>
                            <?php
                            endif;
                            ?>
                        </li>
                        <li><a href="http://localhost/ecommerce/view/sobre.php" <?php if (@$nomemenu == 'sobre'): echo ' class="active" '; endif; ?>>Sobre</a></li>
                        <li><a href="http://localhost/ecommerce/view/loja.php" <?php if (@$nomemenu == 'loja'): echo ' class="active" '; endif; ?>>Loja</a></li>


                        <li><a href="http://localhost/ecommerce/view/contato.php" <?php if (@$nomemenu == 'contato'): echo ' class="active" '; endif; ?>>Contato</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="login-form">
                    <form action="" method="POST">
                        <input type="text" style="height:60px;border-radius:25px;font-size:35px" placeholder="Pesquisar Produto..." />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->