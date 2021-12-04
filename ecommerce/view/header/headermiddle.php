<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a <?php if (@$_SESSION['logadoadm'] <> 0): echo 'href="http://localhost/ecommerce/view/administrativo.php"'; else: echo 'href="http://localhost/ecommerce/index.php"'; endif; ?> >
                        <img src="http://localhost/ecommerce/web/images/home/logo.png" alt="" />
                    </a>
                </div>

            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="http://localhost/ecommerce/view/compras.php" <?php if (@$nomemenu == 'compras'): echo ' class="active" '; endif; ?>>
                                <i class="fa fa-shopping-cart"></i> 
                                Carrinho
                            </a>
                        </li>
                        <?php 
                            if (@$_SESSION['logado'] == 0): ?>
                                <li>
                                    <a href="http://localhost/ecommerce/view/cadastro-cliente.php" <?php if(@$nomemenu == 'cadast'): echo ' class="active" '; endif; ?>>
                                        <i class="fa fa-plus"></i> 
                                        Cadastre-se!
                                    </a>
                                </li>
                            <?php endif;
                        ?>
                        <li>
                            <?php
                            
                            // Quando tá OFF
                            if (@$_SESSION['logado'] == FALSE): 
                            ?>
                                <a href="http://localhost/ecommerce/view/acesso.php" <?php if(@$nomemenu == 'acesso'): echo ' class="active" '; endif; ?>>
                                    <i class="fa fa-user"></i> 
                                    Acessar Conta
                                </a>
                            <?php
                            endif;
                            
                            // Quando tá ONLINE como ADM
                            if (@$_SESSION['logadoadm']): ?>
                                <a href="http://localhost/ecommerce/view/administrativo.php" <?php if (@$nomemenu == 'admin'): echo ' class="active" '; endif; ?>>
                                    <i class="fa fa-lock"></i> 
                                    Logar ADM
                                </a>
                            <?php
                            endif;

                            // Quando tá ONLINE como Cliente
                            if (@$_SESSION['logadocli']): ?>
                                <a href="http://localhost/ecommerce/view/minha-conta.php" <?php if (@$nomemenu == 'admin'): echo ' class="active" '; endif; ?>>
                                    <i class="fa fa-star"></i> 
                                    <b>Meus Pedidos</b>
                                </a>
                            <?php endif;?>
                            
<!--                            <a 
                                <? php 
                                    if (@$_SESSION['logado'] == 0): 
                                        echo ' href="http://localhost/ecommerce/view/acesso.php" '; 
                                    else:
                                        if (@$_SESSION['logadoadm']):
                                            echo ' href="http://localhost/ecommerce/view/administrativo.php" '; 
                                        else:
                                            echo ' href="http://localhost/ecommerce/view/minha-conta.php" '; 
                                        endif;
                                    endif; 
                                    if (@$nomemenu == 'admin'): 
                                        echo ' class="active" '; 
                                    endif; 
                                ?>
                            >
                                <i class="fa fa-lock"></i> Logar
                            </a>-->
                        </li>
                        <?php if (@$_SESSION['logado'] == 0): else: 
                                if (@$_SESSION['logadoadm']): ?>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-user"></i>
                                            Bem vindo, <b><?php echo @$_SESSION['usuario']; ?></b>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='http://localhost/ecommerce/view/login.php?logout=ok' onclick='return confirm("Você realmente deseja deslogar?")'>
                                            <i class="fa fa-power-off"></i>
                                            <b>SAIR</b>
                                        </a>
                                    </li>
                                <?php else: 
                                    if (@$_SESSION['logadocli']): ?>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-user"></i> 
                                                Bem vindo, <b><?php echo @$_SESSION['usuario']; ?>!</b>
                                            </a>
                                        </li>
                                        <li>
                                            <a href='http://localhost/ecommerce/view/acesso.php?logout=ok' onclick='return confirm("Você realmente deseja deslogar?")'>
                                                <i class="fa fa-power-off"></i>
                                                <b>SAIR</b>
                                            </a>
                                        </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-middle-->