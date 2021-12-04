<?php
    $titulopage = 'ADM Ecommerce';
    $nomemenu   = 'admin';
?>
<!DOCTYPE html>
<html lang="pt-br">
    
    <!-- Incremento do conteúdo da tag head -->
    <head>
        <?php include_once 'header/head.php'; ?>
    </head>
    <!--/head-->

    <!-- Controle de Acesso Nível Master -->
    <?php include '../controller/nivelacesso.control.php'; ?>
    <!-- /Control Acess -->
    
<body>
    
    <?php include_once 'header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Painel Administrativo</h2>
                        <div class="single-blog-post">
                            <h3>E-Commerce - Templax Tecnologia</h3>
                            <br>
                            <div class="category-tab shop-details-tab"><!--category-tab-->
                                <div class="col-sm-12">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#pnl-inicio" data-toggle="tab">Início</a></li>
                                        <li><a href="#pnl-cadastros" data-toggle="tab">Cadastros</a></li>
                                        <li><a href="#pnl-vendas" data-toggle="tab">Vendas</a></li>
                                        <li><a href="#pnl-financ" data-toggle="tab">Financeiro</a></li>
                                        <li><a href="#pnl-rel" data-toggle="tab">Relatórios</a></li>
                                        <li><a href="#pnl-mkt" data-toggle="tab">Marketing</a></li>
                                        <li><a href="#pnl-galerias" data-toggle="tab">Galerias</a></li>
                                        <li><a href="#pnl-usuarios" data-toggle="tab">Sistema</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="pnl-inicio">
                                        <div class="text-center">
                                            <h2>Bem Vindo</h2>
                                            <h4 class="text-info">Sistema Templax de e-Commerce</h4>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="pnl-cadastros">
                                        <br><br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Produtos</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="painelitens.php" class="btn btn-default btn-lg">Cadastrar Ítem</a>
                                                <a href="listagem-itens.php" class="btn btn-default btn-lg">Listar Ítens</a>
                                                <a href="listagem-ncm.php" class="btn btn-default btn-lg">Listar NCM</a>
                                                <a href="listagem-codbarras.php" class="btn btn-default btn-lg">Listar Códigos de Barras</a>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Categorias e Sub Categorias</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="painelcategoria.php" class="btn btn-default btn-lg">Cadastrar Categoria e Subcategorias</a>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Fornecedores</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="painelfornecedor.php" class="btn btn-default btn-lg">Cadastrar Fornecedores</a>
                                                <a href="listagem-fornecedores.php" class="btn btn-default btn-lg">Listar Fornecedores</a>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Funcionários</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="painelfuncionarios.php" class="btn btn-default btn-lg">Cadastrar Funcionários</a>
                                                <a href="listagem-funcionarios.php" class="btn btn-default btn-lg">Listar Funcionários</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="pnl-vendas">
                                        <br><br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Pedidos</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="listagem-concluidos.php" class="btn btn-default btn-lg">Concluídos</a>
                                                <a href="listagem-abertos.php" class="btn btn-default btn-lg">Abertos</a>
                                                <a href="listagem-expirados.php" class="btn btn-default btn-lg">Expirados</a>
                                                <a href="listagem-cancelados.php" class="btn btn-default btn-lg">Cancelados</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="pnl-financ">
                                        <br><br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Financeiro</h3>
                                            </div>
                                            <div class="panel-body">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="pnl-rel">
                                        <br><br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Relatórios</h3>
                                            </div>
                                            <div class="panel-body">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="pnl-mkt">
                                        <br><br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Slider</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="painelslider.php" class="btn btn-default btn-lg">Gerenciar Slider</a>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Banner</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="painelpublicidade.php" class="btn btn-default btn-lg">Gerenciar Banner Publicidade</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pnl-galerias">
                                        <br><br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Galerias</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="galeria.php?gallery=itens" class="btn btn-default btn-default btn-lg" target="_blank">Galeria [Itens]</a>
                                                <a href="galeria.php?gallery=publicidade" class="btn btn-default btn-default btn-lg" target="_blank">Galeria [Marketing]</a>
                                                <a href="galeria.php?gallery=slider" class="btn btn-default btn-default btn-lg" target="_blank">Galeria [Slider]</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pnl-usuarios">
                                        <br><br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Acesso</h3>
                                            </div>
                                            <div class="panel-body">
                                                <a href="painelfuncionarios.php" class="btn btn-default btn-default btn-lg">Criar Novo Acesso</a>
                                                <a href="listagem-acesso.php" class="btn btn-default btn-default btn-lg">Geranciar Acessos</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div><!--/category-tab-->

                        </div>
                    </div><!--/blog-post-area-->
                </div>	
            </div>
        </div>
    </section>
	
    <?php include_once 'footer.php'; ?>

    
<script type="text/javascript">
   function getValor(valor){
    $("#recebeValor").html("<option value='0'>Carregando...</option>");
        setTimeout(function(){
            $("#recebeValor").load("class/ajaxValor.php",{id:valor})
        }, 500);
};
</script>
  
    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
</body>
</html>