<?php
    $titulopage = 'Cadastro - Templax E-commerce';
    $nomemenu   = 'cadast';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
<?php 
    // Head
        include_once 'header/head.php'; 

    // Insert
        include '../controller/clienteinsert.control.php';
?>
    
</head><!--/head-->

<body>

    <?php include_once 'header.php'; ?>

    
        <section id="cart_items">
            <div class="container">
                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-8 clearfix">
                            <div class="bill-to">
                                <div class="row text-center">
                                    <div class="col-sm-12">
                                        <div class="shopper-info"><!--login form-->
                                            <h2>Formulário de Cadastro</h2>
                                            <?php echo msg($msgreturn, $tipo); ?>
                                            <form method="post" action="" name="formCadEmpresa" id="formCadEmpresa" enctype="multipart/form-data">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Informações Gerais</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <label>Nome</label><label class="text-danger">*</label>
                                                                <input type="text" name="nome" required maxlength="45" placeholder="Digite aqui seu nome" />
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <label>Sobrenome</label><label class="text-danger">*</label>
                                                                <input type="text" name="sobrenome" required maxlength="45" placeholder="Digite aqui seu sobrenome" />
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <label>Email</label><label class="text-danger">*</label>
                                                                <br><label id="recebeValor2"></label>
                                                                <input type="email" name="email" onblur="getValor(this.value, 0)" id="passaValor" required maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Digite corretamente seu email. Ex.: test@teste.com" />  
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <br><br><input type="button" class="btn btn-warning" value="Verificar Email"/>
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <label>CEP</label><label class="text-danger">*</label>
                                                                <div class="text-danger text-left">Somente números</div>
                                                                <input type="number" name="txtnome" id="txtnome" required placeholder="Digite aqui CEP" onblur="getDados();" />
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <br><br><input type="button" class="btn btn-warning" name="btnPesquisar" value="Pesquisar CEP" onclick="getDados();"/>
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div id="Resultado" class="col-sm-12"></div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <label>Complemento</label>
                                                                <input type="text" name="complemento" placeholder="Digite aqui o complemento" />  
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <label>Número</label><label class="text-danger">*</label>
                                                                <input type="text" name="nro_imovel" placeholder="Imóvel" />  
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label>Celular</label><label class="text-danger">*</label>
                                                                <input type="text" id="celular" name="fone_movel" maxlength="15" />  
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Telefone</label>
                                                                <input type="text" id="telefone" name="fone_fixo" maxlength="14" />
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label>Senha de Acesso</label><label class="text-danger">*</label>
                                                                        <input type="password" required name="senha" id="password" />  
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label>Confirmar Senha</label><label class="text-danger">*</label>
                                                                        <input type="password" name="senhac" id="confirm_password" />  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <h2>CLIENTE COL ??? </H2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <input type="submit" name="cadastrocliente" class="btn btn-primary btn-block" value="Finalizar Cadastro" />
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                        <div class="col-sm-2">
                        </div>					
                    </div>
                </div>
            </div>
	</section> <!--/#cart_items-->
        
	
    <?php include_once 'footer.php'; ?>


<!-- Scripts -->
    <script type="text/javascript">
        function getValor(valor){
            $("#recebeValor2").html("<label class='text-warning'>Pesquisando...</label>");
            setTimeout(function(){
                $("#recebeValor2").load("../controller/ajax2.php",{id:valor});
            }, 500);
        };
    </script>

    <script src="../web/js/jquery.js"></script>
    <script src="../web/js/bootstrap.min.js"></script>
    <script src="../web/js/jquery.scrollUp.min.js"></script>
    <script src="../web/js/price-range.js"></script>
    <script src="../web/js/jquery.prettyPhoto.js"></script>
    <script src="../web/js/main.js"></script>
    
    <script src="../web/js/validatepassword.js"></script>
    <script src="../web/js/buscaCep2.js"></script>
    <script src="../web/js/mascaratel.js"></script>
    
<!-- /Scripts -->
</body>
</html>